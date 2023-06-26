<?php

use App\Http\Controllers\CategoryResourceController;
use App\Http\Controllers\ProductResourceController;
use App\Http\Controllers\TagResourceController;
use App\Http\Controllers\RewiewResourceController;
use App\Http\Controllers\OrderResourceController;
use App\Http\Controllers\UserResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResources([
    'products' => ProductResourceController::class,
    'categories' => CategoryResourceController::class,
    'tags' => TagResourceController::class,
    'rewiews' => RewiewResourceController::class,
    'orders' => OrderResourceController::class,
    'users' => UserResourceController::class,
]);
