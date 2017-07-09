<?php

namespace App\Http\Controllers;

use App\Plan;
use Auth;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function paymentStatus()
    {
    	dd(request()->all());
    }

    public function proofUpload()
    {
    	$this->validate(request(), [
    		'image' => 'required|image',
    		'plan' => 'required|integer'
    	]);

    	$plan = Plan::find(request('plan'));

    	$p = new Payment;
    	$p->transaction_id = uniqid();
    	$p->status = 'pending';
    	$p->amount = $plan->price;
    	$p->type = 'Sales Registration Fee';
    	$p->payment_proof = request('image')->store('payment/proofs', 'public');
    	$p->method = 'transfer';

    	Auth::user()->payments()->save($p);

    	return back();
    }
}
