<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\Auth\AdminRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
    Route::post('delete-account', [RegisterController::class, 'destroy'])->middleware('auth');

    Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

    Route::view('/forgot-password', 'forgotPassword')->name('forgot');
    Route::view('/reset-password', 'resetPassword')->name('reset');
    Route::view('/confirm-password', 'confirmPassword')->name('confirm');
    Route::view('/verify-email', 'verifyEmail')->name('verifyEmail');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:sanctum')->name('dashboard');
    Route::view('/profile', 'profile');
    Route::view('/statistic', 'admin.statistic', ['total' => User::all()->count()]);
    Route::view('/clients', 'admin.clients', ['users' => User::all()]);
});
