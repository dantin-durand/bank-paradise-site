<?php

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
Route::middleware('auth:sanctum')->post('auth/account', [TokenController::class, 'account']);
Route::middleware('auth:sanctum')->post('auth/logout', [TokenController::class, 'logout']);
