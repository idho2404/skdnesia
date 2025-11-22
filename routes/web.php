<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

// Guest routes (not authenticated)
Route::middleware('guest')->group(function () {
  Route::get('/', [AuthController::class, 'loginPage'])->name('login');
  Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
  Route::post('/login', [AuthController::class, 'login'])->name('login.process');

  Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
  Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
