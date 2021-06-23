<?php

use App\Http\Controllers\api\CheckoutController;
use App\Http\Controllers\api\TokenController;
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

Route::middleware('auth:sanctum')->post('checkout/intent', [CheckoutController::class, 'intent']);
Route::middleware('auth:sanctum')->post('checkout/subscribe', [CheckoutController::class, 'subscribe']);
Route::middleware('auth:sanctum')->post('auth/account', [TokenController::class, 'account']);
Route::middleware('auth:sanctum')->post('auth/logout', [TokenController::class, 'logout']);

// Route::get('/news', [TokenController::class, 'getNews']);
// Route::post('/contact', [TokenController::class, 'contactSupport']);
