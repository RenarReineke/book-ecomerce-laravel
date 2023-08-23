<?php

use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TagResourceController;
use App\Http\Controllers\UserResourceController;
use App\Http\Controllers\OrderResourceController;
use App\Http\Controllers\RewiewResourceController;
use App\Http\Controllers\ProductResourceController;
use App\Http\Controllers\CategoryResourceController;
use App\Http\Controllers\Auth\PersonalAccessTokenController;

Route::prefix('auth')->group(function () {
    Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
    Route::delete('/personal-access-tokens', [PersonalAccessTokenController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::apiResources([
    'products' => ProductResourceController::class,
    'categories' => CategoryResourceController::class,
    'tags' => TagResourceController::class,
    'rewiews' => RewiewResourceController::class,
    'orders' => OrderResourceController::class,
    'carts' => CartController::class,
    'users' => UserResourceController::class,
]);
