<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\GoodsController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MutationController;
use App\Http\Controllers\API\StockController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('goods', GoodsController::class);
        Route::resource('mutations', MutationController::class);
        Route::resource('stocks', StockController::class);

        Route::get('/mutations/user/{userId}', [MutationController::class, 'getMutationsByUserId']);
        Route::get('/mutations/goods/{goodsId}', [MutationController::class, 'getMutationsByGoodsId']);

        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
