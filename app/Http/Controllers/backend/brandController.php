<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Image;
use File;

class brandController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.index',compact('brands'));
    }


    // create method-----------------------------------------



// insert method-----------------------------------------------
    public function store(Request $request){
       $this->validate($request,[
        'name'  => 'required',

       ]);
       $brand= new Brand();
       $brand->name = $request->name;
       $brand->description = $request->description;
       
        //brandImage Model insert image
    if ($request->hasFile('brand_image')) {
      //insert that image
      $image = $request->file('brand_image');
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('img/brand/'.$img);
      Image::make($image)->save($location);
      $brand->image = $img;
    }
    $brand->save();
    session()->flash('success', 'A new brand has added successfully');
    return redirect()->route('admin.brand.index');
    }



    // update method----------------------------------------------
    public function update(Request $request,$id){
      $this->validate($request,[
       'name'  => 'required',

      ]);
      
      $brand= Brand::find($id);
      $brand->name = $request->name;
      $brand->description = $request->description;
      $brand->save();
      
       //brandImage Model insert image

       if(count($request->brand_image)>0){
        // delete the old file from the folder
        if(File::exists('img/brand/'.$brand->image)){
           File::delete('img/brand/'.$brand->image);
        }
        
        $image = $request->file('brand_image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('img/brand/'.$img);
        Image::make($image)->save($location);
        $brand->image =$img;
        $brand->save();
      }
   session()->flash('success', 'A new brand has added successfully');
   return redirect()->route('admin.brand.index');

  }

// .......................delete method
    public function delete($id){
      $brand = brand::find($id);
      if(!is_null($brand)){

        $brand->delete();
      }
      session()->flash('success','Data has been deleted');
    	   return back();

    }

}
