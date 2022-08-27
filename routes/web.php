<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CookieConsentController;

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


Route::get('/' , [HomeController::class, 'index']
)->name('home');

Route::get('/category/{slug}' , [CategoryController::class, 'show']
)->name('category');

Route::get('/article/{slug}' , [ArticleController::class, 'show']
)->name('article');

Route::get('/tag/{slug}' , [TagController::class, 'show']
)->name('tag');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/search', [SearchController::class, 'index']
)->name('search');

Route::get('/dashboard', function () { return view('dashboard/dashboard');
})->middleware(['auth'])->name('dashboard');

//writers up
Route::group(['middleware' => ['auth', 'role:1']], function () {

    Route::get('/dashboard/article/{id}', [ArticleController::class, 'form'])->name('dashboard-article');
    Route::post('/dashboard/article/{id}', [ArticleController::class, 'store'])->name('dashboard-article-post');

});

//admin only
Route::group(['middleware' => ['auth', 'role:2']], function () {

    Route::get('/dashboard/articles', [ArticleController::class, 'index'])->name('dashboard-articles');

    Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard-users');

    Route::get('/dashboard/user/{id}', [UserController::class, 'form'])->name('dashboard-user');

    Route::post('/dashboard/user/{id}', [UserController::class, 'store'])->name('dashboard-user-post');

});

Route::get('/legal/{subsection}', function($subsection){
    return view('legal', ['subsection'=>$subsection]);
})->where('subsection', '(terms-of-use|privacy)')->name('legal');

Route::get('/cookie-consent', [CookieConsentController::class, '__invoke' ])->name('cookieConsent');


require __DIR__.'/auth.php';
