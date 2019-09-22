<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Product_img;

class pagesController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->paginate(3);
        return view('frontend.pages.index',compact('products'));
    }

    public function search(Request $request){

        $search = $request->search;

         $products = Product::orWhere('title', 'like','%'.$search.'%')
         ->orWhere('description', 'like','%'.$search.'%')
         ->orWhere('quantity', 'like','%'.$search.'%')
         ->orWhere('price', 'like','%'.$search.'%')
         ->orderBy('id','desc')
         ->paginate(1);
        return view('frontend.pages.product.search', compact('search','products'));
    }

    public function userDashboard(){
        return view('frontend.pages.user.dashboard');
    }


}
