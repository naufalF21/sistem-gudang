<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Resources\User as ResourcesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/users', function (Request $request) {
//     return new ResourcesUser(User::paginate());
// });

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::resource('users', UserController::class);

        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
