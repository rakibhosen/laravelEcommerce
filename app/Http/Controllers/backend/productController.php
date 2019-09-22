<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_img;
use App\Models\Category;
use App\Models\Brand;
use Image;
use File;

class productController extends Controller
{   
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $products = Product::orderBy('id','desc')->get();
 
        return view('backend.pages.product.index',compact('products'));
    }


    // create method-----------------------------------------



// insert method-----------------------------------------------
    public function store(Request $request){
       $this->validate($request,[
        'title'  => 'required',
        'price'  => 'required',
        'offer_price'  => 'nullable',
       ]);
       $product= new Product();
       $product->title = $request->title;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->slug = str_slug($request->title);
       $product->quantity = $request->quantity;
       $product->category_id =$request->category_id;
       $product->brand_id =$request->brand_id;
       $product->admin_id =1;
       $product->save();
        //ProductImage Model insert image
    if ($request->hasFile('product_image')) {
      //insert that image
      $image = $request->file('product_image');
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('img/product/' .$img);
      Image::make($image)->save($location);
      $product_image = new Product_img;;
      $product_image->product_id = $product->id;
      $product_image->image = $img;
      $product_image->save();
    }
    session()->flash('success', 'A new brand has added successfully');
    return redirect()->route('admin.product.index');
    }



    // update method----------------------------------------------
    public function update(Request $request,$id){
      $this->validate($request,[
       'title'  => 'required',
       'price'  => 'required',
       'offer_price'  => 'nullable',
      ]);

    $product = Product::find($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->slug = str_slug($request->title);
    $product->quantity = $request->quantity;
    $product->category_id =$request->category_id;
    $product->brand_id =$request->brand_id;
    $product->admin_id =1;
    $product->save();

         //ProductImage Model insert image

    if(count($request->product_image)>0){
    // delete the old file from the folder
    if(File::exists('img/product/'.$product->image)){
        File::delete('img/product/'.$product->image);
    }
  
     //insert that image
     $image = $request->file('product_image');
     $img = time() . '.'. $image->getClientOriginalExtension();
     $location = public_path('img/product/' .$img);
     Image::make($image)->save($location);
   
     $product_image = new Product_img;;
     $product_image->product_id = $product->id;
     $product_image->image = $img;
     $product_image->save();
   }
   session()->flash('success', 'A new brand has added successfully');
   return redirect()->route('admin.product.index');
   }

  //  delete product--------------------------------------
    public function delete($id){
      $product = Product::find($id);
      if(!is_null($product)){
        $product->delete();
      }
      session()->flash('success','Data has been deleted');
    	   return back();

    }

}
