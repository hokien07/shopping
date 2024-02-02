<?php

use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [\App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/product', [\App\Http\Controllers\HomeController::class, 'product'])->name('product');

Route::prefix('cart')->as('cart.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'getList'])->name('get.list');
    Route::post('/add', [\App\Http\Controllers\CartController::class, 'add'])->name('add');
    Route::post('/delete', [\App\Http\Controllers\CartController::class, 'delete'])->name('delete');
    Route::get('/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
});

Route::prefix('admin')->middleware(['auth'])->as('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('home');
        Route::get('/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('add');
        Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('delete');
    });

    Route::prefix('category')->as('category.')->group(function () {
        Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('home');
        Route::get('/add', [\App\Http\Controllers\CategoryController::class, 'add'])->name('add');
        Route::post('/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
    });


    Route::prefix('blog')->as('blog.')->group(function () {
        Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('home');
        Route::get('/add', [\App\Http\Controllers\BlogController::class, 'add'])->name('add');
        Route::post('/store', [\App\Http\Controllers\BlogController::class, 'store'])->name('store');
        Route::get('/edit/{blog}', [\App\Http\Controllers\BlogController::class, 'edit'])->name('edit');
        Route::put('/update/{blog}', [\App\Http\Controllers\BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\BlogController::class, 'delete'])->name('delete');
    });

    Route::prefix('order')->as('order.')->group(function () {
        Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('home');
        Route::get('/edit/{order}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('edit');
    });

});


