<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function main(){
        return view('admin');
    }

    public function viewbuku() {
        $buku = BukuModel::all();
        return view('admin', ['data' => $buku]);
        // $databuku = BukuModel::all();
        // return view('/admin',compact('databuku'));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }else{
            return view('/');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        $user=AdminModel::firstWhere('username', $data['username']);
        // if (Auth::Attempt($data)) {
        // if (Hash::check($data['password'],$user->password)) {
        if ($data['password']==$user->password) {
            return redirect('/admin');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
