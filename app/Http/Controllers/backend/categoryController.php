<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_img;
use App\Models\Category;
use Image;
use File;

class categoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.category.index',compact('categories'));
    }


    // create method-----------------------------------------



// insert method-----------------------------------------------
    public function store(Request $request){
       $this->validate($request,[
        'title'  => 'required',

       ]);
       $category= new Category();
       $category->name = $request->title;
       $category->description = $request->description;
       
        //categoryImage Model insert image
    if ($request->hasFile('category_image')) {
      //insert that image
      $image = $request->file('category_image');
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('img/category/' .$img);
      Image::make($image)->save($location);
      $category->image = $img;
    }
    $category->save();
    session()->flash('success', 'A new brand has added successfully');
    return redirect()->route('admin.category.index');
    }



    // update method----------------------------------------------
    public function update(Request $request,$id){
      $this->validate($request,[
       'title'  => 'required',

      ]);
      $category= Category::find($id);
      $category->name = $request->title;
      $category->description = $request->description;
      $category->save();
      
       //categoryImage Model insert image

       if(count($request->category_image)>0){
        // delete the old file from the folder
        if(File::exists('img/category/'.$category->image)){
            File::delete('img/category/'.$category->image);
        }

        $image = $request->file('category_image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('img/category/'.$img);
        Image::make($image)->save($location);
        $category->image =$img;
        $category->save();
      }
   session()->flash('success', 'A new brand has added successfully');
   return redirect()->route('admin.category.index');

  }

// .......................delete method
    public function delete($id){
      $category = Category::find($id);
      if(!is_null($category)){

        $category->delete();
      }
      session()->flash('success','Data has been deleted');
    	   return back();

    }

}
