<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\{AdminController,AuthController};
// use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/dashboard');
});

// Route::get('/user',[UserController::class,'index']);
// Route::get('/produk',[ProductController::class,'index']);
// Route::post('/produk',[ProductController::class,'store']);
// Route::get('foto/{product}',[ProductController::class,'tampil']);

// Route::get('/fetch_image/{product}',[ProductController::class,'fetch_image']);
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/postlogin',[AuthController::class,'postlogin']);
Route::get('/logout',[AuthController::class,'logout']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/produk/terbaru',[AdminController::class,'produkterbaru']);
    Route::get('/produk/tampil',[AdminController::class,'produktampil']);
    Route::get('/produk/detail/{product}',[AdminController::class,'detailproduk']);
    Route::post('/produk/update/{product}',[AdminController::class,'update']);
    Route::get('/produk/hapus/{product}',[AdminController::class,'hapusProductById']);
    
    Route::get('/kategori',[AdminController::class,'getAllKategori']);
    Route::post('/kategori',[AdminController::class,'tambahKategori']);
    Route::get('/hapuskategori/{kategori}',[AdminController::class,'hapusKategori']);
    
    Route::get('/jasa/terbaru',[AdminController::class,'jasaterbaru']);
    Route::get('/jasa/tampil',[AdminController::class,'jasatampil']);
    Route::get('/jasa/detail/{jasa}',[AdminController::class,'detailjasa']);
    Route::post('/jasa/updatejasa/{jasa}',[AdminController::class,'updatejasa']);
    Route::get('/jasa/hapus/{jasa}',[AdminController::class,'hapusJasaById']);
    
    Route::get('/ulasan/produk',[AdminController::class,'getAllProduk']);
    Route::get('/ulasan/produk/{product}',[AdminController::class,'getUlasanByIdProduk']);
    
    Route::get('/ulasan/jasa',[AdminController::class,'getAllJasa']);
    Route::get('/ulasan/jasa/{product}',[AdminController::class,'getUlasanByIdJasa']);
    Route::get('/hapus-ulasan/{product}',[AdminController::class,'hapusulasan']);

    Route::post('/ubahfotoproduk/{id}',[AdminController::class,'ubahfotoproduk']);
    Route::post('/ubahfotojasa/{id}',[AdminController::class,'ubahfotojasa']);
});

