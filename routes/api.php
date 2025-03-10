<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('product',[ProductController::class,'save']);

Route::post('/update/{id}', [ProductController::class, 'update']);

Route::delete('/delete/{id}', [ProductController::class, 'delete']);

Route::post('getAllProducts', [ProductController::class, 'getAllProducts']);

Route::post('/getProduct/{id}', [ProductController::class, 'getProduct']);