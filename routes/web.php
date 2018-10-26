<?php

use App\Article;

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
    $articles = App\Article::all();

    return view('overview', ['articles' => $articles]);
});

Route::get('/login', 'MyLoginController@showLogin');
Route::post('/login','MyLoginController@authenticate');
Route::get('/logout', 'MyLoginController@logout');

Route::resource('articles', 'ArticleController')->only([
    'create', 'store', 'update', 'delete'
])->middleware('CheckAdmin');

Route::resource('articles', 'ArticleController')->only([
    'index', 'show'
]);