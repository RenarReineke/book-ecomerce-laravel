<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\RegisterUserController;

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
    Route::get('/dashboard', 'index')->middleware('auth')->name('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

    Route::view('/forgot-password', 'forgotPassword')->name('forgot');
    Route::view('/reset-password', 'resetPassword')->name('reset');
    Route::view('/confirm-password', 'confirmPassword')->name('confirm');
    Route::view('/verify-email', 'verifyEmail')->name('verifyEmail');
});

Route::prefix('admin')->group(function () {
    Route::view('/clients', 'admin.clients', ['users' => User::all()]);
    Route::view('/statistic', 'admin.statistic', ['total' => User::all()->count()]);
    Route::view('/profile', 'profile');
});
