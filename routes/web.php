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

Route::get('/login', function(){
    return view('login');
});

Route::get('/addblog', function() {
    return view('addblog');
});
