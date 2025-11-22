<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::prefix('v1')->group(function () {
  Route::post('/register', [AuthController::class, 'register']);
  Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
  Route::get('/user', [AuthController::class, 'user']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::post('/logout-all', [AuthController::class, 'logoutAll']);
});
