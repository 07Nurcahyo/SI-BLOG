<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getBookCountByYear', [AdminController::class, 'getBookCountByYear']);
Route::get('getBookCountByCategory', [AdminController::class, 'getBookCountByCategory']);
Route::get('getBookCount', [AdminController::class, 'getBookCount']);

// untuk mengambil data di list buku
Route::get('getDataBuku/{id}', [GuestController::class, 'getDataBuku']);

// Route::post('/gambarbuku', App\Http\Controllers\AdminController::class)->name('gambarbuku');