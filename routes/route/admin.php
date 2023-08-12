<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Login\LoginController;
use App\Http\Controllers\Admin\Products\ProductController;

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
Route::get('/admin/product', [ProductController::class, 'get'])->name('product')->middleware('auth');

Route::get('admin/product/new',[ProductController::class, 'newProduct'])->middleware('auth');
Route::post('admin/product/new',[ProductController::class, 'create'])->name('product.store')->middleware('auth');
Route::get('/edit/{id}', [ProductController::class,'getProductEdit'])->name('edit')->middleware('auth');
Route::post('/update/{id}', [ProductController::class,'updateProduct'])->name('product.update')->middleware('auth');
Route::get('/remote/{id}', [ProductController::class,'destroy'])->name('remote')->middleware('auth');


