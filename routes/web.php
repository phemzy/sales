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

Route::get('rename', function(){
	$users = App\User::all();
	$users->map(function($u){
		$u->hasPaid() ? $u->update(['paid' => true]) : '';
	});

	return App\User::where('paid', true)->get();
});

Auth::routes();
Route::name('sale.user.register')->post('sale/user/register', 'Auth\RegisterController@registerSaleUser');

Route::get('/home', 'HomeController@index')->name('home');
Route::name('store.index')->get('store', 'StoreController@index');
Route::name('plan.update')->post('user/plan/update', 'StoreController@updatePlan');
Route::name('voucher.claim')->get('user/voucher/claim/{user}', 'StoreController@claimVoucher');

//STORE ROUTES //
Route::name('cart')->get('store/cart', 'StoreController@showCart');
Route::name('checkout')->get('store/checkout/{slug}', 'StoreController@checkout');
Route::name('category')->get('store/category/{category}', 'StoreController@showCategory');
Route::name('product.show')->get('product/{slug}', 'StoreController@showProduct');
Route::name('add-to-cart')->get('cart/add/{slug}', 'StoreController@addToCart');
Route::name('preorder')->post('store/preorder', 'StoreController@preorder');
Route::name('free')->get('store/cryptocurrency-only', 'StoreController@allFree');
Route::name('proof.upload')->post('payment/upload-proof', 'PaymentController@proofUpload');
Route::name('coupon.check')->get('coupon/check/{coupon}', 'StoreController@checkCoupon');

Route::name('invoice.generate')->get('invoice', 'PaymentController@generateInvoice');

####ADMIN ROUTES #####
Route::name('admin.index')->get('july/flash.sales/admin/index/show', 'AdminController@index');
Route::name('product.add')->get('july/flash.sales/admin/product/add', 'AdminController@addProductForm');
Route::name('product.save')->post('july/flash.sales/admin/product/save', 'AdminController@saveProduct');
Route::name('payment.confirm')->post('july/flash.sales/admin/payment/confirm/{payment}', 'AdminController@confirmPayment');
Route::name('payment.cancel')->post('july/flash.sales/admin/payment/cancel/{payment}', 'AdminController@cancelPayment');
Route::name('payment.all')->get('july/flash.sales/admin/payment/show', 'AdminController@showPayments');
Route::name('login.user')->get('autologin/user/{id}', 'AdminController@loginWIth');

Route::name('flash.users')->get('july/flash.sales/admin/users/all', 'AdminController@flashSaleUsers');
Route::name('flash.users.paid')->get('july/flash.sales/admin/users/all/paid', 'AdminController@flashSaleUsersPaid');
Route::name('flash.users.notpaid')->get('july/flash.sales/admin/users/all/notpaid', 'AdminController@flashSaleUsersNotPaid');

Route::name('c2n.flash.users')->get('july/flash.sales/admin/c2n/users/all', 'AdminController@c2nFlashSaleUsers');
Route::name('c2n.flash.users.paid')->get('july/flash.sales/admin/c2n/users/all/paid', 'AdminController@c2nFlashSaleUsersPaid');
Route::name('c2n.flash.users.notpaid')->get('july/flash.sales/admin/c2n/users/all/notpaid', 'AdminController@c2nFlashSaleUsersNotPaid');

Route::name('c2n.users.all')->get('july/flashsales/admin/users/all', 'AdminController@allC2nUsers');

Route::name('c2n.not.flash.users')->get('july/flash.sales/admin/c2n/not/users/all', 'AdminController@c2nNotFlashSaleUsers');
Route::name('user.mail')->get('july/flash.sales/admin/user/{user}/mail', 'AdminController@sendMailToUser');
Route::name('user.mail.send')->post('july/flash/sales/admin/user/{user}/send', 'AdminController@postMailToUser');
Route::name('mail.all')->get('july/flash.sales/admin/user/send', 'AdminController@sendMailToAll');
Route::name('mail.all.send')->post('july/flash.sales/admin/user/send', 'AdminController@postMailToAll');

Route::name('invoice.send')->get('july/flash.sales/user/{user}/invoice/send', 'AdminController@sendInvoice');

Route::name('details')->get('july/flash.sales/refund/{user}/details', 'AdminController@getAccountDetails');

// Refund Process
Route::name('refund.start')->post('refund/start', 'DetailController@store');
Route::name('refund.mark')->get('july/flash.sales/refund/{user}/mark', 'AdminController@markRefund');
Route::name('vouchers.all')->get('july/flash.sales/vouchers', 'AdminController@getVouchers');
Route::name('voucher.revert')->get('july/flash/{voucher}/revert', 'AdminController@revertVoucher');
