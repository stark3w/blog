<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\Catalog\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Search\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])
    ->name('home');

Route::resource('catalog', CatalogController::class)->only(['index']);

Route::get('/catalog/{catalog_slug}/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/catalog/{catalog_slug}/products/{product_slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/found-products/', [SearchController::class,'index'])
    ->name('search');
Route::get('/found-products/{product_slug}', [SearchController::class, 'show'])
    ->name('found.show');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password', [ResetPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])
        ->name('password.update');

});

Route::middleware('auth')->group(function () {
    Route::delete('/login', [LoginController::class, 'destroy'])
        ->name('logout');

    Route::resource('products', ProductController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
});




