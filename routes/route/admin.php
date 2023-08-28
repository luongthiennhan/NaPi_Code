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

Route::group(['prefix'  =>   'admin/product'], function() {
    Route::get('/', [ProductController::class, 'get'])->name('product')->middleware('auth');
    Route::get('/new',[ProductController::class, 'newProduct'])->middleware('auth');
    Route::post('/new',[ProductController::class, 'create'])->name('product.store')->middleware('auth');
    Route::get('/edit/{id}', [ProductController::class,'getProductEdit'])->name('product.edit')->middleware('auth');
    Route::post('/update/{id}', [ProductController::class,'updateProduct'])->name('product.update')->middleware('auth');
    Route::get('/remote/{id}', [ProductController::class,'destroy'])->name('product.remote')->middleware('auth');
});

Route::group(['prefix'  =>   'admin/product/album'], function() {
    Route::get('/{id}', [ProductController::class,'getProductImages'])->name('get')->middleware('auth');
    Route::post('/images/new',[ProductController::class, 'addImages'])->name('images.new')->middleware('auth');
    Route::get('/remoteImage/{id}/{productId}/{image}', [ProductController::class,'remoteImage'])->name('remoteImage')->middleware('auth');
});

Route::group(['prefix'  =>   'admin/categories'], function() {
    Route::get('/', [CategoryController::class, 'get'])->name('categories')->middleware('auth');
    Route::get('/new',[CategoryController::class, 'newCategory'])->middleware('auth');
    Route::post('/new',[CategoryController::class, 'create'])->name('categories.store')->middleware('auth');
    Route::get('/edit/{id}', [CategoryController::class,'getCategorytEdit'])->name('categories.edit')->middleware('auth');
    Route::post('/update/{id}', [CategoryController::class,'updateCategory'])->name('categories.update')->middleware('auth');
    Route::get('/remote/{id}', [CategoryController::class,'destroy'])->name('categories.remote')->middleware('auth');
});