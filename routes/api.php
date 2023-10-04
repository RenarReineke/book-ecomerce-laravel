<?php

use App\Http\Controllers\Api\Auth\PersonalAccessTokenController;
use App\Http\Controllers\Api\AuthorResourceController;
use App\Http\Controllers\Api\CartResourceController;
use App\Http\Controllers\Api\CategoryResourceController;
use App\Http\Controllers\Api\ImageResourceController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\OrderResourceController;
use App\Http\Controllers\Api\ProductResourceController;
use App\Http\Controllers\Api\PublisherResourceController;
use App\Http\Controllers\Api\RewiewResourceController;
use App\Http\Controllers\Api\RoleResourceController;
use App\Http\Controllers\Api\SeriesResourceController;
use App\Http\Controllers\Api\TagResourceController;
use App\Http\Controllers\Api\UserResourceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::post('/likes', [LikeController::class, 'like']);
Route::post('/dislikes', [LikeController::class, 'dislike']);

Route::get('/kupons', function () {
    $user = Auth::guard('spa')->user()->name;

    return "Ты зашел по токену как клиент магазина {$user}";
})->middleware('auth:spa');

Route::get('/admins', function () {
    $user = Auth::user()->name;

    return "Ты зашел по вебу как сотрудник админки {$user}";
})->middleware('auth:emp');
