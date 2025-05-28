<?php

namespace App\Http\Controllers;

// use PDF;
use App\Models\User;
use App\Models\Order;
use App\Mail\ContactMail;
// use App\Mail\ContactUserMail;
use App\Mail\EnquiryMail;
use App\Mail\InvoiceMail;
use App\Mail\SubmissionMail;
use Illuminate\Http\Request;
use App\Mail\RequirementMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Filament\Notifications\Notification;



class MailController extends Controller
{
    //

    public function custom(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'bail|required|max:255',
            'email' => 'required|max:255',
            'company' => 'required',
            // 'files' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);

        $selectedRequirements = $request->input('requirements', []);

        // Handle file upload
        $file = $request->file('files');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName); // Adjust the destination folder as needed

        $emaildata = [
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'message' => $request->message,
            'changes' => implode(', ', $selectedRequirements),
            'file_path' => public_path('uploads') . '/' . $fileName,

        ];
        // dd($emaildata);
        $product_url = url()->previous();

        $username = $request->name;
        $user_mail = $request->email;

        $mail = new RequirementMail($emaildata, $product_url);

        // $ccEmail = $request->email;
        // if ($ccEmail) {
        //     $mail->cc($ccEmail);
        // }
        $mail->attach($emaildata['file_path'], [
            'as' => $fileName,
        ]);

        Mail::to('support@triplesautomation.com')->send($mail);

        $submission_mail = new SubmissionMail($username);

        $ccEmail = 'support@triplesautomation.com';
        if ($ccEmail) {
            $submission_mail->cc($ccEmail);
        }
        Mail::to($user_mail)->send($submission_mail);

        Notification::make()
        ->title('Custom Solution: Mail From '.$request->email)
        ->success()
        ->sendToDatabase(User::whereHas('roles', function($query)  {
            $query->where('name','Admin');
        })->get());
        return back()->with('success', 'Mail sent successfully.');

    }

    public function sendContact(Request $request){

        $request->validate([
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|max:255',
            'contact' => 'required',
            'message' => 'required',
        ]);

        $contact_data = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'message' => $request->message,

        ];

        $username = $request->f_name;
        $user_mail = $request->email;

        $mail = new ContactMail($contact_data);

        Mail::to('support@triplesautomation.com')->send($mail);

        $submission_mail = new SubmissionMail($username);

        $ccEmail = 'support@triplesautomation.com';
        if ($ccEmail) {
            $submission_mail->cc($ccEmail);
        }
        Mail::to($user_mail)->send($submission_mail);

        return back()->with('success', 'Mail sent successfully.');
    }

    public function sendEnquiry(Request $request){

        $request->validate([
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|max:255',
            'company' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'message' => 'required',
        ]);
        $selectedServices = $request->input('services', []);

        $contact_data = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'company' => $request->company,
            'contact' => $request->contact,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'services' => implode(', ', $selectedServices),
            'message' => $request->message,

        ];

        $username = $request->f_name;
        $user_mail = $request->email;

        $mail = new EnquiryMail($contact_data);

        Mail::to('support@triplesautomation.com')->send($mail);

        $submission_mail = new SubmissionMail($username);

        $ccEmail = 'support@triplesautomation.com';
        if ($ccEmail) {
            $submission_mail->cc($ccEmail);
        }
        Mail::to($user_mail)->send($submission_mail);

        return back()->with('success', 'Mail sent successfully.');
    }

    public function sendInvoice($id)
    {

        $receipts = Order::with('product','customer.profile')->where('id', $id)->first();


        $usermail = auth()->guard('customer')->user()->email;
        $username = auth()->guard('customer')->user()->name;
        $receipt_title = $receipts->product->title;

        $mail = new InvoiceMail($receipts,$username, $receipt_title);
        $pdf  = Pdf::loadView('pdf.invoicepdf',['receipts' => $receipts]);


        $mail->attachData($pdf->output(), 'invoice.pdf');
        Mail::to($usermail)->send($mail);

        return redirect()->route('orderlist');

    }


}
