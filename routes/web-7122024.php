<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomationController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\MailController;
use App\Models\Offer;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('google', [SocialController::class, 'signInwithGoogle']);
Route::get('auth/google/callback', [SocialController::class, 'callbackToGoogle']);

Route::post('custom',[MailController::class,'custom'])->name('custom');
Route::patch('update-cart', [AutomationController::class, 'update'])->name('update-cart');

Route::get('/product/{slug}', [AutomationController::class, 'product_detail'])->name('detail');
Route::get('/subcategory/{slug}', [AutomationController::class, 'subcategory'])->name('subcategory');
Route::post('/subcategory', [AutomationController::class, 'sub_product'])->name('sub_product');
Route::get('/productlist/{name}', [AutomationController::class, 'products'])->name('productlist');

Route::get('add-to-cart/{id}', [AutomationController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart', [AutomationController::class, 'cart'])->name('cart');
Route::delete('remove-from-cart', [AutomationController::class, 'remove'])->name('remove-from-cart');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/profile','profile')->name('profile');
    Route::post('/update','update_userdetails')->name('update');
    Route::get('/logout', 'logout')->name('logout');
});
Route::post('userdetails', [LoginRegisterController::class, 'get_UserProfile'])->name('userdetails');
Route::get('/checkout', [LoginRegisterController::class, 'checkout'])->name('checkout');
Route::get('/address', [LoginRegisterController::class, 'address'])->name('address');

Route::get('payment', [PaymentController::class, 'index'])->name('payment');
Route::post('razorpay-payment', [PaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('ordertrack', [PaymentController::class, 'ordertrack'])->name('ordertrack');
Route::get('/download/{filename}', [PaymentController::class, 'downloadFile']);
Route::post('/mark-as-downloaded/{filename}', [PaymentController::class, 'markAsDownloaded']);
Route::get('orderlist',[PaymentController::class, 'orderlist'])->name('orderlist');
Route::post('/discount',[PaymentController::class, 'discount'])->name('discount');
Route::get('invoice/{orderId}', [PaymentController::class, 'showInvoice'])->name('invoice');

Route::get('/{record}/pdf',[PaymentController::class,'download'])->name('order.pdf.download');

Route::get('/sendInvoice/{id}',[MailController::class,'sendInvoice'])->name('sendInvoice');
Route::get('clients',[AutomationController::class,'clientsRoute'])->name('clients');
Route::get('contact',[AutomationController::class,'contactRoute'])->name('contact');

Route::get('/category', function(){
    return view('pages.categorylist');
})->name('category');