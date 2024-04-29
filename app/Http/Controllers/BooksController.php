<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        return view('guest.listbook');
    }

    public function main(){
        return view('main');
    }
}