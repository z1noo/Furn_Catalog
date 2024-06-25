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

Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/collection',[IndexController::class,'collection'])->name('collection');
Route::get('/home', [IndexController::class,'index']);

Route::get('/homo', [IndexController::class,'home']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [IndexController::class,'profile'])->name('user.profile');
    Route::post('/like/{produkId}', [LikeController::class,'like'])->name('like.store');
Route::post('/like/{id}/has-liked', [LikeController::class,'hasUserLikedProduct'])->name('like.has-liked');
Route::post('/produk/{produk_id}/komentar', [CommentController::class, 'store'])->name('comment.store');
});



Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('/produk/create', [ProdukController::class,'store'])->name('produk.store');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/user-list', [AdminController::class, 'userList'])->name('admin.userList');
    Route::get('/admin/create',[AdminController::class,'create'])->name('admin.create');
    Route::get('/admin/edit/{produk}', [AdminController::class,'edit'])->name('admin.edit');
    Route::get('/admin/user-edit', [AdminController::class, 'userList'])->name('admin.userEdit');
    Route::get('/admin/user-destroy', [AdminController::class, 'userList'])->name('admin.userDestroy');
});

Auth::routes(['verify' => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

