<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'pages.home');
Route::view('/services', 'pages.services');
Route::view('/news', 'pages.news');
Route::view('/news/1', 'pages.article');
Route::view('/contact', 'pages.contact');
Route::view('/register/step2', 'auth.register2');
Route::view('/register/step3', 'auth.register3');
Route::view('/register/step4', 'auth.register4');
Route::view('/dashboard', 'pages.dashboard.index')->middleware('auth');
Route::view('/account', 'pages.dashboard.account')->middleware('auth');
Route::view('/admin/users', 'pages.dashboard.admin.users')->middleware('auth');
Route::view('/admin/news', 'pages.dashboard.admin.news')->middleware('auth');
Route::view('/admin/addnews', 'pages.dashboard.admin.addnews')->middleware('auth');
