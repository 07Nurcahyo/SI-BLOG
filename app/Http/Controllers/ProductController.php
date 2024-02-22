<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = product::all();
        return view('index',compact('products'));
    }
}
