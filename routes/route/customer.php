<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customers\Products\ProductController;
use App\Http\Controllers\Customers\Contact\ContactController;

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


Route::get('/', [ProductController::class, 'getNewProduct']);
Route::get('/product', [ProductController::class, 'get'])->name('product');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/detailProduct/{id}',[ProductController::class,'getDetailProduct'])->name('detailProduct');
