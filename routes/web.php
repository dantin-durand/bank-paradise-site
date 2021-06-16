<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ServicesController;
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


Route::get('/news', [ArticlesController::class, 'renderArticlesList'])->name('news');


/**
 * ROUTE USERS
 */
Route::get('/admin/users', [UsersController::class, 'renderUserList'])->middleware('auth')->name('admin.users');

Route::get('/admin/user/{id}', [UsersController::class, 'showUser'])->middleware('auth')->name('admin.user');

Route::get('/admin/user/settings/{id}', [UsersController::class, 'modifyUser'])->middleware('auth')->name('admin.users.edit');;

Route::put('/admin/users/{id}', [UsersController::class, 'updateUser'])->middleware('auth')->name("admin.users.update");

Route::delete('/admin/users/{id}', [UsersController::class, 'deleteUser'])->middleware('auth')->name("admin.users.delete");

/**
 * ROUTE ARTICLES
 */
Route::get('/admin/news', [ArticlesController::class, 'renderAdminArticlesList'])->middleware('auth')->name('admin.articles');
Route::get('/admin/addnews', [ArticlesController::class, 'renderCreateArticles'])->middleware('auth')->name('admin.articles.add');
Route::get('/admin/news/{id}', [ArticlesController::class, 'renderUpdateArticles'])->middleware('auth')->name('admin.articles.edit');

Route::post('/admin/news', [ArticlesController::class, 'storeArticles'])->middleware('auth')->name('admin.articles.create');

Route::put('/admin/news/{id}', [ArticlesController::class, 'updateArticles'])->middleware('auth')->name('admin.articles.update');

Route::put('/admin/news/{id}/visible', [ArticlesController::class, 'toShowArticles'])->middleware('auth')->name('admin.articles.toshow');

Route::delete('/admin/news/{id}', [ArticlesController::class, 'deleteArticles'])->middleware('auth')->name('admin.articles.delete');

/**
 *  ROUTE ACCOUNT
 */
Route::get('/account', [UsersController::class, 'renderUserInfo'])->middleware('auth');
Route::get('/account/settings', [UsersController::class, 'renderUserEditForm'])->middleware('auth');
Route::patch('/account', [UsersController::class, 'updateUserInfo'])->middleware('auth', 'subscribed')->name('account');


Route::view('/', 'pages.home');
Route::view('/services', 'pages.services');
// Route::view('/news', 'pages.news');
Route::view('/news/1', 'pages.article');
Route::view('/contact', 'pages.contact');
// Route::view('/register', [UsersController::class, 'registerUser']);
Route::view('/register/step2', 'auth.register2')->name('register.step2');
// Route::view('/register/step3', 'auth.register3');
Route::get('/register/step3', [CheckoutController::class, 'index']);
Route::post('/register/step3', [CheckoutController::class, 'store']);
Route::view('/register/step4', 'auth.register4')->name('register.step4');
Route::view('/dashboard', 'pages.dashboard.index')->middleware('auth')->name('dashboard');


Route::post('/community', [CommunityController::class, 'addUserCommunity']);
Route::get('/service', [ServicesController::class, 'redirectUserOnLogin'])->middleware('auth');

// Route::view('/admin/news', 'pages.dashboard.admin.news')->middleware('auth');

// relou mac avec ses raccourcis de sybole de merde je le fais tout le temps quand je veux save 