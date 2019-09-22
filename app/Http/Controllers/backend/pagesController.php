<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_img;
use App\Models\Brand;

class pagesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function index(){
        return view('backend.layout.master');
    }
}
