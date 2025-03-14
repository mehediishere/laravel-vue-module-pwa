<?php

use Illuminate\Support\Facades\Route;
use Modules\Pos\Http\Controllers\PosController;

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
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');

    // Catch-all route for Vue Router SPA to handle other routes
    Route::get('/pos/{any?}', [PosController::class, 'index'])->where('any', '.*');
});
