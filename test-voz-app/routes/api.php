<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', 'App\Http\Controllers\CategoryController');
Route::apiResource('products', 'App\Http\Controllers\ProductController');