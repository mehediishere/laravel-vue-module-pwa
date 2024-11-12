<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;

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

Route::group([], function () {
//    Route::resource('product', ProductController::class)->names('product');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/add', [ProductController::class, 'store'])->name('product.add');
    Route::get('/product/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/view', [ProductController::class, 'show'])->name('product.view');
});
