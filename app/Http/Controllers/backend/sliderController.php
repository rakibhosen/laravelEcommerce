<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Image;
use File;

class sliderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function index(){
        $sliders = Slider::orderBy('priority','asc')->get();
        return view('backend.pages.slider.index',compact('sliders'));
    }
    public function store(Request $request){
    	$this->validate($request,[
      'title' =>'required',
      'priority'=>'required',
      'image'=>'required',
    	],
    	[
    	'name.required' => 'Please provide a slider name',
      'priority.required' => 'Please provide a slider priority',
      'image.required' => 'Please provide a valid image',
       	]);
    
    $slider = new slider();
    $slider->title=$request->title;
    $slider->button_text=$request->button_text;
    $slider->button_link=$request->button_link;
    $slider->priority =$request->priority;

        if ($request->hasFile('image')) {
            //insert that image
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('img/slider/' .$img);
            Image::make($image)->save($location);
    
            $slider->image = $img;
            
          }
    
    $slider->save();

    session()->flash('success','A new slider has added successfully');
    return redirect()->route('admin.slider.index');
}


   public function update(Request $request, $id){
    $this->validate($request,[
      'title' =>'required',
      'priority'=>'required',
      'image'=>'nullable|image',
    	],
    	[
    	'name.required' => 'Please provide a slider name',
      'priority.required' => 'Please provide a slider priority',
      'image.required' => 'Please provide a valid image',
       	]);
    $slider = Slider::find($id);
    $slider->title=$request->title;
    $slider->button_text=$request->button_text;
    $slider->button_link=$request->button_link;
    $slider->priority =$request->priority;

    
    if ($request->image> 0) {
      if (File::exists('img/slider/'.$slider->image)) {
        File::delete('img/slider/'.$slider->image);
      }
        //insert that image
        $image = $request->file('image');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = public_path('img/slider/' .$img);
        Image::make($image)->save($location);

        $slider->image = $img;
  }
  $slider->save();

    session()->flash('success','A new slider has updated successfully');
    return redirect()->route('admin.slider.index');
}


public function delete($id)
{
  $slider = Slider::find($id);
  if (!is_null($slider)) {
    //Delete Image
    if (File::exists('img/slider/'.$slider->image)) {
        File::delete('img/slider/'.$slider->image);
      }
    $slider->delete();
  }
  session()->flash('success', 'Slider has deleted successfully !!');
  return back();

}

}
