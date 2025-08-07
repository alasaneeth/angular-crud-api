<?php

use Illuminate\Support\Facades\Route;

//import controller ProductController
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\PostController;

//posts
Route::resource("/post", PostController::class);