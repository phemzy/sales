<?php

namespace App\Http\Controllers;

use App\Plan;
use Auth;
use App\Payment;
use Illuminate\Http\Request;
use PDF;

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

    public function generateInvoice()
    {
        if(request()->has('id')){
            auth()->loginUsingId(request('id'));

            if(auth()->user()->hasPaid()){
                $pdf = PDF::loadView('invoice');
                return $pdf->download('invoice.pdf');
            }

            auth()->logout();

            session()->flash('error', 'Sorry, you are not qualified');

            return redirect('/');  
        }

        return redirect('/');  
    }
}
