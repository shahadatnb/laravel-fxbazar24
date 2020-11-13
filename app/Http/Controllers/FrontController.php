<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
    	$products = Product::where('status',1)->get();
    	return view('frontend.index',compact('products'));
    }
}
