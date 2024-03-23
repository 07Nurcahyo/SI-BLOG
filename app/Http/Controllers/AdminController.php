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
        $buku = BukuModel::all();
        return view('admin.admin', ['data' => $buku]);
    }

    // public function login(){
    //     return view('admin/admin_login');
    // }

    // public function viewbuku() {
    //     $buku = BukuModel::all();
    //     return view('admin', ['data' => $buku]);
    //     // $databuku = BukuModel::all();
    //     // return view('/admin',compact('databuku'));
    // }

    public function login()
    {
        if (Auth::check()) {
            return redirect('main');
        }else{
            return view('admin/admin_login');
        }
    }

    // public function actionlogin(Request $request)
    // {
    //     $data = [
    //         'username' => $request->input('username'),
    //         'password' => $request->input('password'),
    //     ];
    //     $user=AdminModel::firstWhere('username', $data['username']);
    //     // if (Auth::Attempt($data)) {
    //     // if (Hash::check($data['password'],$user->password)) {
    //     if ($data['password']==$user->password) {
    //         return redirect('/admin');
    //     }else{
    //         Session::flash('error', 'Username atau Password Salah');
    //         return redirect('/');
    //     }
    // }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        $user = AdminModel::where([['username', $data['username']],['password', $data['password']]])->first();
        if ($user != null) {
            return redirect('main');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('login_admin');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('admin/login_admin');
    }


}
