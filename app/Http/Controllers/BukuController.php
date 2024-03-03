<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;

class BukuController extends Controller
{
    public function viewbuku(){

        $buku = BukuModel::all();
        return view('admin', ['data' => $buku]);

        // $databuku = BukuModel::all();
        // return view('/admin',compact('databuku'));
    }
}
