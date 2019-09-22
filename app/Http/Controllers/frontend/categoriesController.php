<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class categoriesController extends Controller
{
    //

    public function showCategory($id){
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('frontend.pages.category.show',compact('category'));
        }else{
            session()->flash('errors','Sorry there is no category by this ID');
            return redirect('/');
        }
    }

}
