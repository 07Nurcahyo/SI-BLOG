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

Route::get('/', [MainController::class, 'index']);
// Route::get('/admin', [AdminController::class, 'viewbuku'])->name('/admin');

Route::get('/login_admin', [AdminController::class, 'login'])->name('login');
Route::post('actionlogin', [AdminController::class, 'index'])->name('index');
Route::get('main', [AdminController::class, 'main'])->name('main');
Route::get('actionlogout', [AdminController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('/data_buku', [AdminController::class, 'data_buku']);

Route::get('/backup_admin', [AdminController::class, 'backup']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/list', [AdminController::class, 'list']); //menampilkan data uer dalam bentuk json untuk datatables
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/', [AdminController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::get('/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/{id}', [AdminController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});



// qrcode
// Route::get('/qrcode',[ProductController::class,'qrcode']);
// Route::get('/create',[ProductController::class,'create']);
// Route::post('/post',[ProductController::Class,'store']);