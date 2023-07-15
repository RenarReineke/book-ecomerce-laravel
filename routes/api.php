<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\TagResourceController;
use App\Http\Controllers\UserResourceController;
use App\Http\Controllers\OrderResourceController;
use App\Http\Controllers\RewiewResourceController;
use App\Http\Controllers\ProductResourceController;
use App\Http\Controllers\CategoryResourceController;
use App\Http\Controllers\PersonalAccessTokenController;

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

Route::get('/login', function (Request $request) {
    // $token = $request->user()->createToken('ttt');
    $token = Auth::check();
    return ['token' => $token];
});

Route::middleware('auth:sanctum')->get('/test', function (Request $request) {
    return 'Test';
});

Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/personal-access-tokens', [PersonalAccessTokenController::class, 'destroy']);
