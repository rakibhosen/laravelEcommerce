<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function index(){
        return view('frontend.pages.cart');
    }

   public function store(Request $request){
      
    $this->validate($request,[
        'product_id' =>  'required'
    ],
    
    [
        'product_id.required'=>'please give a product'
    ]);
    if(Auth::check()){
        $cart=Cart::where('user_id',Auth::id())
        ->where('product_id',$request->product_id)
        ->where('order_id', NULL)
        ->first();

    }else{
        $cart =Cart::where('ip_address', request()->ip())
        ->where('product_id',$request->product_id)
        ->where('order_id', NULL)
        ->first();
    }

    if (!is_null($cart)) {
        $cart->increment('product_quantity');
        // return back();
      }else{
       $cart = new Cart();
       if(Auth::check()){
           $cart->user_id =  Auth::id();
       }
       $cart->ip_address = request()->ip();
       $cart->product_id = $request->product_id;
       $cart->save();
       session()->flash('success','product has added to cart');
       return back();
    }
   }

   public function update(Request $request, $id){
      $cart = Cart::find($id);
      if(!is_null($cart)){
          $cart->product_quantity =$request->product_quantity;
          $cart->save();
      }else{
          return redirect()->route('carts.index');
      }
      session()->flash('success','cart Item has updated successfully!!');
      return back();
   }

   public function delete($id){
       $cart = Cart::find($id);
       if(!is_null($cart)){
           $cart->delete();
           return back();
       }
   }
}
