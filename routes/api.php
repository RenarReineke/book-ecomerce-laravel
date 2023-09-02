<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\TagResourceController;
use App\Http\Controllers\CartResourceController;
use App\Http\Controllers\RoleResourceController;
use App\Http\Controllers\UserResourceController;
use App\Http\Controllers\ImageResourceController;
use App\Http\Controllers\OrderResourceController;
use App\Http\Controllers\AuthorResourceController;
use App\Http\Controllers\RewiewResourceController;
use App\Http\Controllers\SeriesResourceController;
use App\Http\Controllers\ProductResourceController;
use App\Http\Controllers\CategoryResourceController;
use App\Http\Controllers\PublisherResourceController;
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
    'carts' => CartResourceController::class,
    'users' => UserResourceController::class,
    'authors' => AuthorResourceController::class,
    'publishers' => PublisherResourceController::class,
    'series' => SeriesResourceController::class,
    'roles' => RoleResourceController::class,
    'images' => ImageResourceController::class,
]);

Route::put('/carts/{cart}/add', [CartResourceController::class, 'updateCartItem']);
