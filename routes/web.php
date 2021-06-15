<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;
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


Route::get('/news', [ArticlesController::class, 'renderArticlesList'])->middleware('auth')->name('news');

Route::get('/admin/users', [UsersController::class, 'renderUserList'])->middleware('auth')->name('adminUserList');
Route::delete('/admin/users/{id}', [UsersController::class, 'deleteUser'])->middleware('auth')->name("deleteUser");


Route::get('/admin/news', [ArticlesController::class, 'renderAdminArticlesList'])->middleware('auth')->name('adminNewsList');
Route::view('/admin/addnews', 'pages.dashboard.admin.addnews')->middleware('auth');


Route::post('/admin/news', [ArticlesController::class, 'addArticles'])->middleware('auth')->name('createArticle');

Route::patch('/admin/news/{id}', [ArticlesController::class, 'updateArticles'])->middleware('auth');
Route::delete('/admin/news/{id}', [ArticlesController::class, 'deleteArticles'])->middleware('auth');


Route::get('/account', [UsersController::class, 'renderUserInfo'])->middleware('auth');
Route::patch('/account', [UsersController::class, 'updateUserInfo'])->middleware('auth');


Route::view('/', 'pages.home');
Route::view('/services', 'pages.services');
// Route::view('/news', 'pages.news');
Route::view('/news/1', 'pages.article');
Route::view('/contact', 'pages.contact');
// Route::view('/register', [UsersController::class, 'registerUser']);
Route::view('/register/step2', 'auth.register2');
// Route::view('/register/step3', 'auth.register3');
Route::get('/register/step3', [CheckoutController::class, 'index']);
Route::post('/register/step3', [CheckoutController::class, 'store']);
Route::view('/register/step4', 'auth.register4');
Route::view('/dashboard', 'pages.dashboard.index')->middleware('auth');

// Route::view('/admin/news', 'pages.dashboard.admin.news')->middleware('auth');

// relou mac avec ses raccourcis de sybole de merde je le fais tout le temps quand je veux save 