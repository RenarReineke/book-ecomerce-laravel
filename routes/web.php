<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\AdminTagResourceController;
use App\Http\Controllers\Admin\AdminCartResourceController;
use App\Http\Controllers\Admin\AdminImageResourceController;
use App\Http\Controllers\Admin\AdminOrderResourceController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\AdminAuthorResourceController;
use App\Http\Controllers\Admin\AdminClientResourceController;
use App\Http\Controllers\Admin\AdminRewiewResourceController;
use App\Http\Controllers\Admin\AdminSeriesResourceController;
use App\Http\Controllers\Admin\AdminProductResourceController;
use App\Http\Controllers\Admin\AdminCategoryResourceController;
use App\Http\Controllers\Admin\AdminEmployeeResourceController;
use App\Http\Controllers\Admin\AdminPublisherResourceController;

Route::get('/', function () {
    return view('layouts.welcome');
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
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth:sanctum')->name('profile');
    Route::resources([
        'products' => AdminProductResourceController::class,
        'authors' => AdminAuthorResourceController::class,
        'series' => AdminSeriesResourceController::class,
        'publishers' => AdminPublisherResourceController::class,
        'categories' => AdminCategoryResourceController::class,
        'tags' => AdminTagResourceController::class,
        'rewiews' => AdminRewiewResourceController::class,
        'images' => AdminImageResourceController::class,
        'orders' => AdminOrderResourceController::class,
        'carts' => AdminCartResourceController::class,
        'clients' => AdminClientResourceController::class,
        'employees' => AdminEmployeeResourceController::class,
    ]);

    Route::post('carts/{:id}/remove', [AdminCartResourceController::class, 'remove'])->name('removeItemFromCart');
    Route::post('carts/{:id}/add', [AdminCartResourceController::class, 'remove'])->name('removeItemFromCart');
});
