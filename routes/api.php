<?php

use App\Http\Controllers\Catalog\ProductController;
use App\Http\Controllers\Search\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


