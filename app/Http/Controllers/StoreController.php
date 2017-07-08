<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\NewVoucher;
use App\Voucher;
use App\Category;
use App\Product;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->only(['preorder', 'updatePlan']);
    }
    public function index()
    {
        $latest = Product::latest()->take(8)->get();
        $phone = Category::where('name', 'Phones and Gadgets')->first();
        $fashion = Category::where('name', 'Fashion and Apparel')->first();
        $elec = Category::where('name', 'Electrical and Home Items')->first();
        $air = Category::where('name', 'Air Conditioners and TVs')->first();
    	return view('store.index', [
            'latest' => $latest,
            'phone' => $phone,
            'fashion' => $fashion,
            'elec' => $elec,
            'air' => $air
        ]);
    }

    public function showCart()
    {
    	return view('store.cart');
    }

    public function allFree()
    {
        $pro = Product::where('crypto_price', 100)->paginate(15);

        return view('store.free', [
            'pro' => $pro,
        ]);
    }

    public function checkout($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if(!$product || $product->outOfStock())
            return back();

    	return view('store.checkout')->withProduct($product);
    }

    public function showCategory(Category $category)
    {
    	return view('store.category', [
    		'category' => $category,
            'pros' => $category->products()->paginate(15)
    	]);
    }

    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if(!$product){
            return back();
        }

    	return view('store.product', [
            'product' => $product
        ]);
    }

    public function addTocart($slug)
    {
        $p = Product::where('slug', $slug)->first();

        if(!$p){
            return back();
        }

        $cart = new Cart;


    }

    public function preorder()
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'product' => 'required',
            'crypto_type' => 'required'
        ]);

        if(request()->user()->order_count == 0){
            return back();
        }

        $product = Product::where('slug', request('product'))->first();

        if(!$product || $product->outOfStock())
            session()->falsh('error' , 'Out of Stock');
            return back();

        $order = new Order;
        $order->order_number = 'sale-' . str_random(12) . '-july';
        $order->user_id = Auth::id();
        $order->status = 'pending';
        $order->product_id = $product->id;
        $order->total = $product->paying_amount;
        $order->crypto_type = request('crypto_type');
        $order->save();

        $product->quantity = $product->quantity -1;
        $product->save();

        Auth::user()->order_count = Auth::user()->order_count - 1;
        Auth::user()->save();

        \Mail::to(Auth::user())->send(new \App\Mail\OrderReceived($order));

        session()->flash('success', 'Order Received! Check your dashboard for details.');

        return redirect()->route('store.index');
    }

    public function updatePlan()
    {
        $this->validate(request(), [
            'plan' => 'required|integer'
        ]);

        Auth::user()->update(['plan' => request('plan')]);

        session()->flash('success', 'Plan updated');

        return back();
    }

    public function claimVoucher(User $user)
    {
        $v = Voucher::where('user_id', Auth::id())->where('recipient_id', $user->id)->first();
        if($v){
            session()->flash('error', 'Voucher already claimed');
            return back();
        }

        $voucher = Voucher::forceCreate([
            'name' => 'FLASH-' . str_random(8) . rand(12, 100), 
            'amount' => 1000,
            'recipient_id' => $user->id,
            'user_id' => Auth::id(),
            'claimed' => true,
        ]);

        Auth::user()->notify(new NewVoucher($voucher));

        session()->flash('success', 'Voucher sent to your mail.');

        return back();
    }
}
