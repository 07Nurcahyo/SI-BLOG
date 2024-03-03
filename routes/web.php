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
// Route::get('/admin', [AdminController::class, 'main']);
Route::get('/admin', [BukuController::class, 'viewbuku']);
Route::get('/login', [AdminController::class, 'login']);

// qrcode
// Route::get('/qrcode',[ProductController::class,'qrcode']);
// Route::get('/create',[ProductController::class,'create']);
// Route::post('/post',[ProductController::Class,'store']);