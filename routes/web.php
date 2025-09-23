<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

// Página inicial (welcome)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cadastro
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Dashboard vulnerável (sem autenticação e usando query string)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard'); // sem middleware 'auth'
