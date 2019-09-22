<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\District;

class districtController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $districts = District::orderBy('name','desc')->get();
        return view('backend.pages.district.index',compact('districts'));
    }


    // create method-----------------------------------------



// insert method-----------------------------------------------
    public function store(Request $request){
       $this->validate($request,[
        'district_name'  => 'required',

       ]);
       $district= new district();
       $district->name = $request->district_name;
       $district->division_id = $request->division_id;
 
    $district->save();
    session()->flash('success', 'A new brand has added successfully');
    return redirect()->route('admin.district.index');
    }



    // update method----------------------------------------------
    public function update(Request $request,$id){
      $this->validate($request,[
        'district_name'  => 'required',

      ]);
      $district= district::find($id);
      $district->name = $request->district_name;
      $district->division_id = $request->division_id;
      $district->save();
      

   session()->flash('success', 'A new district has added successfully');
   return redirect()->route('admin.district.index');

  }

// .......................delete method
    public function delete($id){
      $district = district::find($id);
      if(!is_null($district)){

        $district->delete();
      }
      session()->flash('success','Data has been deleted');
    	   return back();

    }
}
