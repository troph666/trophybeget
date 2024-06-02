<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\Admin\ProductController;



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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::post('products/{id}/change-status', [ProductController::class, 'changeStatus'])->name('product.changeStatus');
});


Route::get('catalog', [ProductController::class, 'catalog'])->name('catalog');
Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
Route::get('/seller/dashboard', [SellerDashboardController::class, 'index'])->name('seller.products');

Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::post('/admin/product/{id}/changeStatus', 'Admin\ProductController@changeStatus')->name('admin.product.changeStatus');












Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
