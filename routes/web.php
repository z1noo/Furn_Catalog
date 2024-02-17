<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::get('home', [IndexController::class,'home']);

Route::post('/like/{produkId}', [LikeController::class,'like'])->name('like.store');
Route::post('/like/{id}/has-liked', [LikeController::class,'hasUserLikedProduct'])->name('like.has-liked');
Route::post('/produk/{produk_id}/komentar', [CommentController::class, 'store'])->name('comment.store');

Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('/produk/create', [ProdukController::class,'store'])->name('produk.store');

Route::get('/admin/user-list', [AdminController::class, 'userList'])->name('admin.userList');
Route::get('/admin/create',[AdminController::class,'create'])->name('admin.create');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

