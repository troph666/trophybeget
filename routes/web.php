<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('index');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');


Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
});


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AdminController::class, 'loginForm'])->name('login');

    Route::post('login', [AdminController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::post('products/{id}/change-status', [ProductController::class, 'changeStatus'])->name('product.changeStatus');
    });
});


Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::post('/admin/products/{id}/changeStatus', [ProductController::class, 'changeStatus'])->name('admin.product.changeStatus');
Route::get('/catalog', [ProductController::class, 'approvedProducts'])->name('catalog');
Route::middleware('auth')->group(function () {
    Route::get('/admin/products', [ProductController::class, 'adminProductList'])->name('admin.products');
    Route::post('/admin/products/{id}/approve', [ProductController::class, 'approveProduct'])->name('admin.product.approve');
});

Route::post('/admin/products/{id}/change-status', [ProductController::class, 'changeStatus'])->name('admin.products.changeStatus');
Route::post('/admin/products/{id}/approve', [ProductController::class, 'approveProduct'])->name('admin.product.approve');

Route::middleware('auth')->group(function () {
    Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products');
    Route::post('/admin/products/{id}/approve', [AdminController::class, 'approveProduct'])->name('admin.product.approve');
});
Route::get('/', 'App\Http\Controllers\ExampleController@index');
Route::get('/seller/products', [SellerDashboardController::class, 'index'])->name('seller.products');

Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/admin/products/{id}/changeStatus', [ProductController::class, 'changeStatus'])->name('admin.product.changeStatus');
Route::patch('/change-status/{id}', 'Admin\ProductController@changeStatus')->name('admin.product.changeStatus');
Route::post('/admin/product/{id}/approve', 'AdminController@approveProduct')->name('admin.product.approve');
Route::post('/admin/product/{id}/approve', [AdminController::class, 'approveProduct'])->name('admin.product.approve');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::group(['middleware' => ['web']], function () {
    Route::get('/cart', 'CartController@index')->name('cart.index');
});
