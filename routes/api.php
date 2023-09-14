<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\Auth\PersonalAccessTokenController;
use App\Http\Controllers\Api\TagResourceController;
use App\Http\Controllers\Api\CartResourceController;
use App\Http\Controllers\Api\RoleResourceController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\ImageResourceController;
use App\Http\Controllers\Api\OrderResourceController;
use App\Http\Controllers\Api\AuthorResourceController;
use App\Http\Controllers\Api\RewiewResourceController;
use App\Http\Controllers\Api\SeriesResourceController;
use App\Http\Controllers\Api\ProductResourceController;
use App\Http\Controllers\Api\CategoryResourceController;
use App\Http\Controllers\Api\PublisherResourceController;

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
Route::put('/carts/{cart}/increase', [CartResourceController::class, 'increase']);
Route::put('/carts/{cart}/decrease', [CartResourceController::class, 'decrease']);

