<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/izbrannoe', function () {
    return view('izbrannoe');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/catalog', function () {
    return view('catalog'); 
})->name('catalog');


