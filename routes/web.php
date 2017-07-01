<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('payment.status')->post('payment/status', 'PaymentController@paymentStatus');
Route::name('register.new')->get('register/new', function(){
	return view('auth.register');
});

Route::name('register.new')->post('register/new', function(){
	dd(request()->all());
});

