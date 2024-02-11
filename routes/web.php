<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [IndexController::class,'index']);
Route::post('/like/{produkId}', [LikeController::class,'like'])->name('like.store');
Route::post('/like/{id}/has-liked', [LikeController::class,'hasUserLikedProduct'])->name('like.has-liked');
Route::post('/produk/{produk_id}/komentar', [CommentController::class, 'store'])->name('comment.store');

Route::post('/upload', [ProdukController::class,'store'])->name('produk.store');
Auth::routes();
