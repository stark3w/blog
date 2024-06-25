<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', \App\Http\Controllers\Posts\PostController::class);
