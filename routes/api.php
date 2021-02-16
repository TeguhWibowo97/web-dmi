<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\UlasanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/produk',[ProductController::class,'store']);
Route::get('/produk',[ProductController::class,'index']);
Route::get('/produk/{product}',[ProductController::class,'show']);
Route::post('/getprodukbykategori',[ProductController::class,'getprodukbykategori']);


Route::get('/kategori',[KategoriController::class,'index']);
Route::post('/kategori',[KategoriController::class,'store']);


Route::get('/jasa',[JasaController::class,'index']);
Route::post('/jasa',[JasaController::class,'store']);
Route::post('/getjasabykategori',[JasaController::class,'getjasabykategori']);
Route::post('/carijasa',[JasaController::class,'carijasa']);

Route::post('/cariproduk',[ProductController::class,'cariproduk']);
Route::post('/ulas',[UlasanController::class,'create']);
Route::post('/ulasanjasa',[UlasanController::class,'show']);

Route::post('/ulasanproduk',[UlasanController::class,'ulasanproduk']);