<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Notifications\NewEmail;
use App\Product;
use App\Payment;
use Illuminate\Http\Request;
use App\Notifications\PaymentInvoice;
use App\{Voucher, Transaction, Market, Package};
use App\Mail\VoucherReverted;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
    	return view('admin.index');
    }

    public function addProductForm()
    {
    	return view('admin.add_product');
    }

    public function saveProduct()
    {
    	$this->validate(request(), [
    		'name' => 'required',
    		'slug' => 'required|unique:products,slug',
    		'description' => 'required',
    	]);

        $i = \Cloudinary\Uploader::upload(request('image'));

    	$p = Product::forceCreate([
    		'name' => request('name'),
    		'slug' => request('slug'),
    		'description' => nl2br(request('description')),
    		'category_id' => request('category_id'),
    		'featured_image' => $i['public_id'],
    		'naira_price' => request('naira_price'),
    		'crypto_price' => request('crypto_price'),
    		'quantity' => request('quantity'),
            'paying_amount' => request('paying_amount'),
    	]);

    	return back();
    }

    public function confirmPayment(Payment $payment)
    {
        $user = $payment->user;
        $plan = $user->plans;

        if($payment->status == 'successful')
            return back();

        if($plan->name == 'basic'){
            $user->order_count = 1;
        }elseif($plan->name == 'absolute'){
            $user->order_count = 2;
        }elseif($plan->name == 'premium'){
            $user->order_count = 3;
        }

        $user->paid = true;
        $user->save();

        $payment->status = 'successful';
        $payment->save();

        \Mail::to($user)->send(new \App\Mail\PaymentConfirmed($user));

        return back();
    }

    public function cancelPayment(Payment $payment)
    {
        $payment->cancel();

        return back();
    }

    public function showPayments()
    {
        $payments = Payment::where('id', '!=', 16)->get();

        return view('admin.payments', [
            'payments' => $payments,
            'no' => 1
        ]);
    }

    public function loginWIth($id)
    {
        Auth::loginUsingId($id);

        return redirect()->route('home');
    }


    public function flashSaleUsers()
    {
        $users = User::where('flash_sale_user', true);

        session(['users' => $users->get(), 'type' => 'Registered Flash Sale Users']);

        // dd($users->pluck('first_name'));

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function flashSaleUsersPaid()
    {
        $users = User::where('flash_sale_user', true)->where('paid', true);

        session(['users' => $users->get(), 'type' => 'Registered Flash Sale Users - Paid']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function flashSaleUsersNotPaid()
    {
        $users = User::where('flash_sale_user', true)->where('paid', false);

        session(['users' => $users->get(), 'type' => 'Registered Flash Sale Users - Not Paid']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }


    public function c2nFlashSaleUsers()
    {
        $users = User::where('flash_sale_user', false)->whereNotNull('plan');

        session(['users' => $users->get(), 'type' => 'C2N Users For Flash Sales']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function c2nFlashSaleUsersPaid()
    {
        $users = User::where('flash_sale_user', false)->whereNotNull('plan')->where('paid', true);

        session(['users' => $users->get(), 'type' => 'C2N Users For Flash Sales - Paid']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function c2nFlashSaleUsersNotPaid()
    {
        $users = User::where('flash_sale_user', false)->whereNotNull('plan')->where('paid', false);

        session(['users' => $users->get(), 'type' => 'C2N Users For Flash Sales - Not Paid']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function c2nNotFlashSaleUsers()
    {
        $users = User::where('flash_sale_user', false)->where('plan', null);

        session(['users' => $users->get(), 'type' => 'C2N Users Not For Flash Sales']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function inactiveUsers()
    {
        $users = User::where('empty_transaction', false)->where('plan', null);

        session(['users' => $users->get(), 'type' => 'C2N Users Not For Flash Sales']);

        
        return view('admin.users', [
            'users' => $users->paginate(100),
            'no' => 1
        ]);
    }

    public function allC2nUsers()
    {
        session(['users' => User::all(), 'type' => 'All C2N Users']);

        
        return view('admin.users', [
            'users' => User::paginate(100),
            'no' => 1
        ]);
    }

    public function sendMailToUser(User $user)
    {

        return view('admin.singlemail', [
            'user' => $user,
        ]);
    }

    public function postMailToUser(User $user)
    {
        $user->notify(new NewEmail(request()->all()));

        session()->flash('success', 'Mail Sent');

        return back();
    }

    public function sendMailToAll()
    {
        return view('admin.mailall');
    }

    public function postMailToAll()
    {
        $users = session('users');

        \Notification::send($users, new NewEmail(request()->all()));

        session()->flash('success', 'Mail Sent To All');

        return back();
    }

    public function sendInvoice(User $user)
    {
        $user->invoice = true;
        $user->save();

        $user->notify(new PaymentInvoice($user));

        session()->flash('success', 'Done.');

        return back();
    }

    public function getAccountDetails(User $user)
    {
        return view('admin.refund', compact('user'));
    }

    public function markRefund(User $user)
    {
        $user->details()->update(['fully_paid' => true]);

        return back();
    }

    public function getVouchers()
    {
        $vouchers = Voucher::with('owner')->get();

        return view('admin.vouchers.all', compact('vouchers'));
    }

    public function revertVoucher(Voucher $voucher)
    {
        $package = Package::where('amount', $voucher->amount)->first();

        $t = Transaction::create([

                'user_id' => $voucher->user_id,

                'market_id' => Market::where('abbr_name', 'TBC')->first()->id,

                'package_id' => $package->id,

                'status' => 'pending',

                'type' => 'sell',

                'created_at' => $voucher->created_at

            ]);

        \Mail::to($voucher->owner)->send(new VoucherReverted($voucher, $t));

        $voucher->delete();

        return back();
    }
}
