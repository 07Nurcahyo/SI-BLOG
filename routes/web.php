<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::post('actionlogin', [DashboardController::class, 'index'])->name('index');
Route::get('main', [AdminController::class, 'main'])->name('main');
Route::get('actionlogout', [AdminController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('/data_buku', [AdminController::class, 'data_buku']);
Route::get('/statistik', [MainController::class, 'statistik']);

Route::get('/backup_admin', [AdminController::class, 'backup']);

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', [DashboardController::class, 'index']);
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/list', [AdminController::class, 'list']); //menampilkan data uer dalam bentuk json untuk datatables
    Route::post('/list', [AdminController::class, 'list']); //menampilkan data uer dalam bentuk json untuk datatables
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/', [AdminController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::get('/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/{id}', [AdminController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});

Route::group(['prefix' => 'penerbit'], function() {
    Route::get('/', [PenerbitController::class, 'index']);
    Route::post('/list', [PenerbitController::class, 'list']); //menampilkan data uer dalam bentuk json untuk datatables
    Route::get('/create', [PenerbitController::class, 'create']);
    Route::post('/', [PenerbitController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [PenerbitController::class, 'show']);
    Route::get('/{id}/edit', [PenerbitController::class, 'edit']);
    Route::put('/{id}', [PenerbitController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [PenerbitController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']); //menampilkan data uer dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'lokasi'], function() {
    Route::get('/', [LokasiController::class, 'index']);
    Route::post('/list', [LokasiController::class, 'list']); //menampilkan data uer dalam bentuk json untuk datatables
    Route::get('/create', [LokasiController::class, 'create']);
    Route::post('/', [LokasiController::class, 'store']); //menyimpan data user baru
    Route::get('/{id}', [LokasiController::class, 'show']);
    Route::get('/{id}/edit', [LokasiController::class, 'edit']);
    Route::put('/{id}', [LokasiController::class, 'update']); //menyimpan perubahan data user
    Route::delete('/{id}', [LokasiController::class, 'destroy']);
});



// qrcode
// Route::get('/qrcode',[ProductController::class,'qrcode']);
// Route::get('/create',[ProductController::class,'create']);
// Route::post('/post',[ProductController::Class,'store']);