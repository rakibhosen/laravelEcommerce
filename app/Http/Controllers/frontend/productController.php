<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Product_img;

class productController extends Controller
{
  public function index(){
    $products = Product::orderBy('id','desc')->paginate(3);
    return view('frontend.pages.product.index',compact('products'));
}
  

  public function show($slug){
    $product = Product::where('slug',$slug)->first();
    if(!is_null($product)){
        return view('frontend.pages.product.show',compact('product'));
    }else{
        session()->flash('errors','No products in stock');
    }
  }

}
