<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


/*
|-----------------
| Web Routes
|-----------------
*/


/**-----------------------------
 *      [ GUEST ROUTES ]
 *------------------------------
 */

/*---------- NEWS ----------*/

Route::get('/', [ServicesController::class, 'getLatestNews']);
Route::get('/news/{id}', [ArticlesController::class, 'renderArticleDetails']);
Route::get('/news', [ArticlesController::class, 'renderArticlesList'])->name('news');

/*-------- REGISTER --------*/

Route::view('/register/step2', 'auth.register2')->name('register.step2');
Route::get('/register/step3', [CheckoutController::class, 'index'])->middleware('auth');
Route::post('/register/step3', [CheckoutController::class, 'store'])->middleware('auth');
Route::view('/register/step4', 'auth.register4')->name('register.step4');

/*--------- ABOUT ----------*/

Route::view('/services', 'pages.services');

/*------- CONTACT US -------*/

Route::get('/contact', [ContactController::class, 'renderContact']);



/**-----------------------------
 *      [ MEMBER ROUTES ]
 *------------------------------
 */

/*-------- ACCOUNT ---------*/

Route::get('/account', [UsersController::class, 'renderUserInfo'])->middleware('auth');
Route::get('/account/settings', [UsersController::class, 'renderUserEditForm'])->middleware('auth');
Route::patch('/account', [UsersController::class, 'updateUserInfo'])->middleware('auth', 'subscribed')->name('account');

/*------- COMMUNITY --------*/

Route::post('/community', [CommunityController::class, 'addUserCommunity'])->middleware('auth');

/*------- DASHBOARD --------*/

Route::view('/dashboard', 'pages.dashboard.index')->middleware('auth')->name('dashboard');




/**-----------------------------
 *      [ ADMIN ROUTES ]
 *------------------------------
 */
/*--------- USERS ---------*/

Route::get('/admin/users', [UsersController::class, 'renderUserList'])->middleware('auth')->name('admin.users');
Route::get('/admin/user/{id}', [UsersController::class, 'renderUserDetails'])->middleware('auth')->name('admin.user');
Route::get('/admin/user/settings/{id}', [UsersController::class, 'renderUserAdminEditForm'])->middleware('auth')->name('admin.users.edit');;
Route::put('/admin/users/{id}', [UsersController::class, 'updateUser'])->middleware('auth')->name("admin.users.update");
Route::delete('/admin/users/{id}', [UsersController::class, 'deleteUser'])->middleware('auth')->name("admin.users.delete");

/*--------- NEWS ----------*/

Route::get('/admin/news', [ArticlesController::class, 'renderAdminArticlesList'])->middleware('auth')->name('admin.articles');
Route::get('/admin/addnews', [ArticlesController::class, 'renderCreateArticleForm'])->middleware('auth')->name('admin.articles.add');
Route::get('/admin/news/{id}', [ArticlesController::class, 'renderUpdateArticleForm'])->middleware('auth')->name('admin.articles.edit');
Route::post('/admin/news', [ArticlesController::class, 'addArticle'])->middleware('auth')->name('admin.articles.create');
Route::put('/admin/news/{id}', [ArticlesController::class, 'updateArticles'])->middleware('auth')->name('admin.articles.update');
Route::put('/admin/news/{id}/visible', [ArticlesController::class, 'updateArticleVisibility'])->middleware('auth')->name('admin.articles.toshow');
Route::delete('/admin/news/{id}', [ArticlesController::class, 'deleteArticles'])->middleware('auth')->name('admin.articles.delete');

/*----- SUBSCRIPTION ------*/

Route::get('/admin/subscriptions', [SubscriptionsController::class, 'renderSubscriptions'])->middleware('auth');





/**-----------------------------
 *      [ UTILS ROUTES ]
 *------------------------------
 */

/*-------- LOGIN ----------*/

Route::get('/service', [ServicesController::class, 'redirectUserOnLogin'])->middleware('auth');
