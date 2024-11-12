<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/account', function () {
    return view('pages.account');
})->name('account');
