<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use Auth;

class userController extends Controller
{
   public function dashboard(){
    $user = Auth::user();
    return view('frontend.pages.user.dashboard',compact('user'));
   }

   public function profile(){
    $divisions = Division::orderBy('priority', 'asc')->get();
    $districts = District::orderBy('name', 'asc')->get();

    $user = Auth::user();
    return view('frontend.pages.user.profile',compact('user','divisions','districts'));
  }
  
  public function profileUpdate(Request $request){
    $user=Auth::user();

    $this->validate($request,[
     'name' => 'required|string|max:30',
     'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
     
     'division_id' => 'required|numeric',
     'district_id' => 'required|numeric',
     'phone_no' => 'required|max:15|unique:users,phone_no,'.$user->id,

     ]);


     $user->name     = $request->name;
     $user->email          = $request->email;
     $user->division_id    = $request->division_id;
     $user->district_id    = $request->district_id;
     $user->phone_no       = $request->phone_no;
     $user->address = $request->address;  
     
       if($request->password!=NULL||$request->password!=""){
           $user->password=Hash::make($request->password);
       }
     $user->ip_address      = request()->ip();
     $user->save();
     session()->flash('success','User profile has updated successfully');

     return back();

  }
}
