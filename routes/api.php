<?php

use App\Http\Controllers\api\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|-----------------
| API Routes
|-----------------
*/

Route::post('/contact', [TokenController::class, 'contactSupport']);
Route::post('auth/register', [TokenController::class, 'register']);
Route::post('auth/login', [TokenController::class, 'login']);
Route::post('auth/logout', [TokenController::class, 'logout']);
Route::get('/news', [TokenController::class, 'getNews']);
Route::middleware('auth:sanctum')->post('auth/account', [TokenController::class, 'account']);
Route::middleware('auth:sanctum')->post('auth/logout', [TokenController::class, 'logout']);
