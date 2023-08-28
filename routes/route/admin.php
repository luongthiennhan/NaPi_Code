<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Login\LoginController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Categories\CategoryController;

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


Auth::routes();
// Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('admin/product', [ProductController::class, 'get'])->name('product')->middleware('auth');

Route::get('admin/product/new',[ProductController::class, 'newProduct'])->middleware('auth');
Route::post('admin/product/new',[ProductController::class, 'create'])->name('product.store')->middleware('auth');
Route::get('edit/product/{id}', [ProductController::class,'getProductEdit'])->name('edit.product')->middleware('auth');
Route::get('admin/album/{id}', [ProductController::class,'getProductImages'])->name('admin.album')->middleware('auth');
Route::post('album/images/new',[ProductController::class, 'addImages'])->name('images.new')->middleware('auth');
Route::get('remoteImage/{id}/{productId}/{image}', [ProductController::class,'remoteImage'])->name('remoteImage')->middleware('auth');
Route::post('update/{id}', [ProductController::class,'updateProduct'])->name('product.update')->middleware('auth');
Route::get('remote/product/{id}', [ProductController::class,'destroy'])->name('remote.product')->middleware('auth');

Route::get('admin/categories', [CategoryController::class, 'get'])->name('categories')->middleware('auth');
Route::get('admin/category/new',[CategoryController::class, 'newCategory'])->middleware('auth');
Route::post('admin/category/new',[CategoryController::class, 'create'])->name('category.store')->middleware('auth');
Route::get('remote/category/{id}', [CategoryController::class,'destroy'])->name('remote.category')->middleware('auth');
Route::get('edit/category/{id}', [CategoryController::class,'getCategorytEdit'])->name('edit.category')->middleware('auth');
Route::post('update/category/{id}', [CategoryController::class,'updateCategory'])->name('category.update')->middleware('auth');