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
	$pro = App\Product::where('crypto_price', 100)->latest()->take(4)->get();
    return view('welcome', [
    	'pro' => $pro,
    ]);
});

Auth::routes();
Route::name('sale.user.register')->post('sale/user/register', 'Auth\RegisterController@registerSaleUser');

Route::get('/home', 'HomeController@index')->name('home');
Route::name('store.index')->get('store', 'StoreController@index');
Route::name('plan.update')->post('user/plan/update', 'StoreController@updatePlan');

//STORE ROUTES //
Route::name('cart')->get('store/cart', 'StoreController@showCart');
Route::name('checkout')->get('store/checkout/{slug}', 'StoreController@checkout');
Route::name('category')->get('store/category/{category}', 'StoreController@showCategory');
Route::name('product.show')->get('product/{slug}', 'StoreController@showProduct');
Route::name('add-to-cart')->get('cart/add/{slug}', 'StoreController@addToCart');
Route::name('preorder')->post('store/preorder', 'StoreController@preorder');
Route::name('free')->get('store/cryptocurrency-only', 'StoreController@allFree');
Route::name('proof.upload')->post('payment/upload-proof', 'PaymentController@proofUpload');

####ADMIN ROUTES #####
Route::name('admin.index')->get('july/flash.sales/admin/index/show', 'AdminController@index');
Route::name('product.add')->get('july/flash.sales/admin/product/add', 'AdminController@addProductForm');
Route::name('product.save')->post('july/flash.sales/admin/product/save', 'AdminController@saveProduct');
Route::name('payment.confirm')->post('july/flash.sales/admin/payment/confirm/{payment}', 'AdminController@confirmPayment');
Route::name('payment.all')->get('july/flash.sales/admin/payment/show', 'AdminController@showPayments');
