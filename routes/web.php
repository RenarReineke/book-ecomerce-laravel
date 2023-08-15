<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', [RegisterUserController::class, 'store'])->middleware('guest');
Route::post('delete-account', [RegisterUserController::class, 'destroy'])->middleware('auth');

Route::post('login', [AuthSessionController::class, 'store'])->middleware('guest');
Route::delete('logout', [AuthSessionController::class, 'destroy'])->middleware('auth');

Route::prefix('admin')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin');
});

Route::prefix('admin')->group(function () {
    Route::view('/register', 'registerForm')->name('register');
    Route::view('/login', 'loginForm')->name('login');
    Route::view('/forgot-password', 'forgotPassword')->name('forgot');
    Route::view('/reset-password', 'resetPassword')->name('reset');
    Route::view('/confirm-password', 'confirmPassword')->name('confirm');
    Route::view('/verify-email', 'verifyEmail')->name('verifyEmail');
});
