<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\District;

class divisionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index(){
        $divisions = Division::orderBy('priority','desc')->get();
        return view('backend.pages.division.index',compact('divisions'));
    }


    // create method-----------------------------------------



// insert method-----------------------------------------------
    public function store(Request $request){
       $this->validate($request,[
        'division_name'  => 'required',

       ]);
       $division= new Division();
       $division->name = $request->division_name;
       $division->priority = $request->division_priority;
 
    $division->save();
    session()->flash('success', 'A new brand has added successfully');
    return redirect()->route('admin.division.index');
    }



    // update method----------------------------------------------
    public function update(Request $request,$id){
      $this->validate($request,[
        'division_name'  => 'required',

      ]);
      $division= division::find($id);
      $division->name = $request->division_name;
      $division->priority = $request->division_priority;
      $division->save();
      

   session()->flash('success', 'A new Division has added successfully');
   return redirect()->route('admin.division.index');

  }

// .......................delete method
    public function delete($id){
      $division = division::find($id);
      if(!is_null($division)){

        $division->delete();
      }
      session()->flash('success','Data has been deleted');
    	   return back();

    }
}
