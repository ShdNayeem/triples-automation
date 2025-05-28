<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AutomationController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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
// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');

Route::get('/',[HomeController::class,'video'])->name('home');

// Company Details  Route
Route::view('/about', 'pages.about');
Route::view('/contact-us', 'pages.contact');
Route::view('/enquiry', 'pages.enquiry');

// Services Route

Route::get('/services/3d-floor', [HomeController::class,'threedfloor'])->name('threedfloor');
Route::get('/services/landscape', [HomeController::class,'landscape'])->name('landscape');
Route::get('/services/chilled-water-system', [HomeController::class,'chilledwatersystem'])->name('chilledwatersystem');
Route::view('/services/niagara4-custom-drivers', 'pages.niagara4-custom-drivers');
Route::view('/services/niagara4-engineering-services', 'pages.niagara4-engineering-services');
Route::view('/services/niagara4-software-services', 'pages.niagara4-software-services');
Route::view('/services/return-policy', 'pages.return-policy');



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

// Forgot Password Controller & Routes

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('payment', [PaymentController::class, 'index'])->name('payment');
Route::post('razorpay-payment', [PaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('ordertrack', [PaymentController::class, 'ordertrack'])->name('ordertrack');
Route::get('/download/{filename}', [PaymentController::class, 'downloadFile']);
Route::post('/mark-as-downloaded/{filename}', [PaymentController::class, 'markAsDownloaded']);
Route::get('orderlist',[PaymentController::class, 'orderlist'])->name('orderlist');
Route::post('/discount',[PaymentController::class, 'discount'])->name('discount');
Route::get('showinvoice/{orderId}', [PaymentController::class, 'showInvoice'])->name('showInvoice');
Route::get('invoice/{orderId}', [PaymentController::class, 'downloadInvoice'])->name('download-invoice');

Route::get('/{record}/pdf',[PaymentController::class,'download'])->name('order.pdf.download');

// Mail Routes

Route::get('/sendInvoice/{id}',[MailController::class,'sendInvoice'])->name('sendInvoice');
Route::get('/send/contact',[MailController::class,'sendContact'])->name('contactMail');
Route::get('/send/enquiry',[MailController::class,'sendEnquiry'])->name('enquiryMail');


Route::get('clients',[AutomationController::class,'clientsRoute'])->name('clients');
Route::get('contact',[AutomationController::class,'contactRoute'])->name('contact');

Route::get('/category', function(){
    return view('pages.categorylist');
})->name('category');