<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;


class OrderController extends Controller
{
   public function index(){
       $orders = Order::orderBy('id','asc')->get();
       return view('backend.pages.order.index',compact('orders'));
   }
   public function show($id){
       $order =  Order::find($id);
       $order->is_seen_by_admin =1;
       $order->save();
       return view('backend.pages.order.show',compact('order'));

   }
   public function completed($id){
       
    }
    public function delete($id){
       
    }
    public function chargeUpdate($id){
       
    }
    public function paid($id){
       
    }
}
