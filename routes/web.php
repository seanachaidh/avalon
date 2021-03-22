<?php

use App\Article;
use Web\ArticleController;

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

Route::get('/', function () {
    return redirect()->intended('/articles');
});

Route::get('/feed.rss', function() {
    $articles = Article::all();
    return view('rssfeed', ['articles' => $articles]);
});

Route::get('/login', 'MyLoginController@showLogin');
Route::post('/login','MyLoginController@authenticate');
Route::get('/logout', 'MyLoginController@logout');

Route::resource('articles', ArticleController::class)->only([
    'index', 'show'
]);

Route::resource('articles.comments', 'CommentController')->only([
    'store'
]);

