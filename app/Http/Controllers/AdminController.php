<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function main(){
        return view('admin');
    }

    public function login() {
        return view('login');
    }
}
