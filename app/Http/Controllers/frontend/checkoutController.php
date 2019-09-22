<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class checkoutController extends Controller
{
    public function index(){
        $payments = Payment::orderBy('priority','asc')->get();
        return view('frontend.pages.checkout',compact('payments'));
    }
    public function store(Request $request){
       $this->validate($request,[
            'name' =>'required',
            'email' =>'required',
            'phone_no' =>'required',
            'payment_method_id' =>'required',
            'shipping_address' =>'required',
        ]);

        $order =  new Order();
        
        if($request->payment_method_id !='cash_in'){
            if($request->transaction_id == NULL ||  empty($request->transaction_id)){
                return session()->flash('sticky_error','please give transaction ID');
                return redirect()->route('carts.index');
            }
        }
        
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->transaction_id = $request->transaction_id;
        $order->name = $request->name;
        $order->message = $request->message;
        $order->ip_address = request()->ip();
        if(Auth::check()){
           $order->user_id =Auth::id();
        }

        $order->payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;
        $order->save();
        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
          }
      
        session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
        return redirect()->route('carts.index');


    }
}
