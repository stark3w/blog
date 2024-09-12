<?php

use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');


Route::resource('catalog', CatalogController::class);




