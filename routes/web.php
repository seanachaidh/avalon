<?php

use App\Models\Article;
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

Route::get('/aboutme', function() {
    return view('aboutme');
});

Route::get('/feed.rss', function() {
    $articles = Article::all();
    return view('rssfeed', ['articles' => $articles]);
});

Route::get('/login', 'Web\MyLoginController@showLogin');
Route::post('/login','Web\MyLoginController@authenticate');
Route::get('/logout', 'Web\MyLoginController@logout');

Route::resource('articles', ArticleController::class)->only([
    'index', 'show', 'create'
]);

Route::resource('articles.comments', 'CommentController')->only([
    'store'
]);

