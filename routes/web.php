<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', [App\Http\Controllers\ProductController::class,'index'])->name('products');
Route::get('/cart', [App\Http\Controllers\ProductController::class,'cart'])->name('cart');
Route::get('/add-to-cart/{product}', [App\Http\Controllers\ProductController::class,'addToCart'])->name('add-cart');
Route::get('/remove/{id}', [App\Http\Controllers\ProductController::class,'removeFromCart'])->name('remove');

Route::post('/pay', [App\Http\Controllers\PaymentController::class,'pay'])->name('pay');
Route::get('payment-success',[App\Http\Controllers\PaymentController::class,'paymentSuccess'])->name('success.pay');

// Route::post('/pay', 'PaymentController@pay')->name('pay');

// Route::post('/indipay/response/success', 'PaymentController@response')->name('pay.response');
// Route::post('/indipay/response/failure', 'PaymentController@response')->name('pay.response');

// Route::resource('registration',App\Http\Controllers\Vendor\RegistrationController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'],function(){
	Route::group(['middleware'=>'admin.guest:admin'],function(){
		Route::view('login','admin.login')->name('admin.login');
		Route::post('login',[App\Http\Controllers\AdminController::class,'login'])->name('admin.login');
	});
	Route::group(['middleware'=>'admin.auth'],function(){
		Route::view('dashbord','admin.dashbord')->name('admin.dashbord');
		Route::resource('plants',App\Http\Controllers\Plants\PlantController::class);
	});

	Route::post('logout',[App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');
});


