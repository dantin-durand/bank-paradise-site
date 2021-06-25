<?php

use App\Http\Controllers\api\ArticlesController;
use App\Http\Controllers\api\CheckoutController;
use App\Http\Controllers\api\CommunityController;
use App\Http\Controllers\api\ServicesController;
use App\Http\Controllers\api\TokenController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|-----------------
| API Routes
|-----------------
*/

Route::post('auth/register', [TokenController::class, 'register']);
Route::post('auth/login', [TokenController::class, 'login']);
Route::post('auth/logout', [TokenController::class, 'logout']);
Route::get('checkout/plans', [CheckoutController::class, 'plans']);
Route::get('/articles', [ArticlesController::class, 'getArticles']);

Route::middleware('auth:sanctum')->post('/community', [CommunityController::class, 'createCommunity']);
Route::middleware('auth:sanctum')->post('checkout/intent', [CheckoutController::class, 'intent']);
Route::middleware('auth:sanctum')->post('checkout/subscribe', [CheckoutController::class, 'subscribe']);
Route::middleware('auth:sanctum')->post('auth/account', [TokenController::class, 'account']);
Route::middleware('auth:sanctum')->post('auth/logout', [TokenController::class, 'logout']);

Route::middleware('auth:sanctum')->put('/user', [UserController::class, 'updateUser']);

Route::post('/customerCare', [ServicesController::class, 'contactSupport']);

// Route::get('/news', [TokenController::class, 'getNews']);
// Route::post('/contact', [TokenController::class, 'contactSupport']);
