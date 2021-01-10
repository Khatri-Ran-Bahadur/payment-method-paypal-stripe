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