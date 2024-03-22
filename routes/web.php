<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/', [MainController::class, 'main']);
// Route::post('actionlogin', [AdminController::class, 'actionlogin'])->name('actionlogin');
Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin', [AdminController::class, 'viewbuku'])->name('/admin');
// Route::get('/admin', [AdminController::class, 'viewbuku']);



// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
// Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');












// qrcode
// Route::get('/qrcode',[ProductController::class,'qrcode']);
// Route::get('/create',[ProductController::class,'create']);
// Route::post('/post',[ProductController::Class,'store']);