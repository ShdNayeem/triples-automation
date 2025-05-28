<?php

namespace App\Http\Controllers;

// use PDF;

use Exception;
use App\Models\User;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Mail\OrderMail;
use App\Models\Discount;
use App\Models\OrderItem;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CompanyProfile;
use Barryvdh\DomPDF\Facade\Pdf;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class PaymentController extends Controller
{
    //
    public function index(): View
    {
        return view('orders.payment');
    }

    /**
     * Write code on Method
     *
    //  * @return response()
     */
    private function update_user(){
        // $user = Auth()->guard('customer')->user()->id;
        $user = Auth()->guard('customer')->user();
        // dd(['user_id'=>$user->id,'user_name'=>$user->name, 'user_email'=>$user->email]);
    }
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // dd(session('cart'));
        if (session('cart')) {
            foreach (session('cart') as $id => $product) {
                $quantity = $product['quantity'];
                $product_name = $product['name'];
                $product_price = $product['price'];
                $product_image = $product['image'];
                if (isset($product['id'])) {
                    $id = $product['id'];
                    break; // Break the loop once 'id' is found
                }
            }

        // dd($product['image']);
        }
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                // $id = null;
                // $quantity = null;

                $coupon_discount_value = session('coupon_discount_value', 0);
                // dd($payment);
                $order = Order::create([
                    'product_id' => $id,
                    'customer_id' => Auth::guard('customer')->user()->id,
                    'order_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' =>  Auth::guard('customer')->user()->email,
                    'amount' => $response['amount'] / 100,
                    'status' => $response['captured'],
                    'quantity' => $quantity,
                    'discount_value' => $coupon_discount_value,
                    'json_response' => json_encode((array) $response)
                ]);
                $order_id = $order->id;
                // dd($order->id, ['product' => $id]);
                $order_items  = session('cart');

                foreach( $order_items as $id => $order_item ) {

                        if (isset($order_item['id'])) {
                            $id = $order_item['id'];
                            break; // Break the loop once 'id' is found
                        }
                    OrderItem::create([
                        'order_id' => $order_id,
                        'product_id' => $id,
                        'product_name' => $order_item['name'],
                        'product_quantity' => $order_item['quantity'],
                        'product_price' => $order_item['price'],
                        'product_image' => $order_item['image'],
                        'product_attachment' => $order_item['product_attachments'],
                    ]);
                }
                session()->forget(['coupon_discount_value','cart']);
                session()->forget('error');
            } catch (Exception $e) {
                // return $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        $order_items = Order::with('product','customer.profile', 'order_items')->where('id', $order_id)->first();
        $user_mail = auth()->guard('customer')->user()->email;
        $username = auth()->guard('customer')->user()->name;

        $order_mail = new OrderMail($username, $user_mail, $order_items);

        $ccEmail = 'support@triplesautomation.com';
        if ($ccEmail) {
            $order_mail->cc($ccEmail);
        }
        Mail::to($user_mail)->send($order_mail);

        Notification::make()
                ->title('Product'. $product_name.' has been purchased.')
                ->success()
                ->sendToDatabase(User::whereHas('roles', function($query)  {
                    $query->where('name','Admin');
                })->get());

        return redirect()->route('all-products', [$order_id])->with('success', 'Product Purchased Successfully!');
    }
    public function ordertrack()
    {

        $receipts = Order::with('product')->where('customer_id', Auth()->guard('customer')->user()->id)->latest()->first();
        // dd($receipts);
        $orders = Order::with('order_items', 'product')->where('customer_id', Auth()->guard('customer')->user()->id)->latest()->first();
        // dd($orders);
       return view('orders.ordertrack', compact('receipts','orders'));
    }

    public function orderlist()
    {
        $orderlists = Order::with('product', 'order_items')->where('customer_id', Auth()->guard('customer')->user()->id)->latest()->paginate(5);
        // dd($orderlists);
        return view('orders.orderslist', compact('orderlists'));

    }
    public function allproducts($id)
    {
        $allproducts = Order::with('product','customer.profile', 'order_items')->where('id', $id)->first();
        // dd($allproducts);
        return view('orders.allproducts', compact('allproducts'));

    }

    public function downloadInvoice($id){

        $receipts = Order::with('product','customer.profile', 'order_items')->where('id', $id)->first();

        $pdf  = Pdf::loadView('pdf.invoicepdf',['receipts' => $receipts]);
        return $pdf->download();
    }


    public function downloadFile($file_name)
    {
    $file_path = storage_path("app/public/{$file_name}");

    if (!Storage::disk('public')->exists($file_name)) {
        abort(404, 'File not found');
    }

    return response()->download($file_path);
}
    public function markAsDownloaded(Request $request, $orderId)
    {
        // Mark the order as downloaded
        $status = Order::where('id', $orderId)->update(['flag' => true]);

        if ($status) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to mark as downloaded'], 500);
        }
    }

public function discount(Request $request){

        // $coupon_name =  $request->json('inputData');
        $coupon_name =  $request->get('coupon_name');
        // dd($coupon_name);
        $coupon = Discount::where('discount_name', $coupon_name)->where('is_active',true)->first();

        if ($coupon) {
            $currentDate = now()->toDateString();

            // Check if the current date is within the validity period
            if ($currentDate >= $coupon->valideFrom && $currentDate <= $coupon->valideTo) {

                session(['coupon_discount_value' => $coupon->discount_value]);

                // return response()->json(['message' => 'Coupon is valid. Apply discount. Coupon Value: ' . $coupon->discount_value]);
                return back()->withSuccess($coupon_name.' - '.'Coupon  Applied!');
            } else {
                // The coupon is expired
                return response()->json(['message' => 'Coupon is expired.']);
            }
        } else {
            // Coupon not found
            return response()->json(['message' => 'Invalid coupon.']);
        }
    }

     public function showInvoice($orderId){
        $receipts = Order::with('product','customer.profile')->where('id', $orderId)->first();
        return view('orders.invoice',compact('receipts'));
    }


    public function download(Order $record){

         $receipts = Order::with('product','customer.profile')->where('id', $record->id)->first();
        $profile = CompanyProfile::first();
        $image = Media::where('model_type', CompanyProfile::class)
                              ->where('model_id', $profile->id)
                              ->where('collection_name', 'logo')
                              ->first();

        $logo = $image ? $image->getFullUrl() : '../assets/img/logo.png';


        $signature =   Media::where('model_type', CompanyProfile::class)
           ->where('model_id', $profile->id)
           ->where('collection_name', 'signature')
           ->first();

        $sign = $signature ? $signature->getFullUrl() : '../assets/img/logo.png';


           $client = new Party([
            'name'          => 'Triple-s Automation',
            'phone'         => $profile->mobile_1,
            'custom_fields' => [
                'GST'      => $profile->GST,
                'Door No' => $profile->door_no,
                'Street' => $profile->street,
                'State' => $profile->state,

            ],
        ]);
        $customer = new Buyer([
            'name'          => $receipts->customer->name,
            'custom_fields' => [
                'email' => $receipts->customer->email,
            ],
        ]);

        $item = InvoiceItem::make($receipts->product->title)->pricePerUnit($receipts->amount);


        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->logo($logo)
            // ->discountByPercent($receipts->discount_value)
            ->serialNumberFormat($receipts->order_payment_id)
            ->date($receipts->created_at)
            ->currencySymbol('$')
            ->addItem($item);

        return $invoice->stream();
    }
}
