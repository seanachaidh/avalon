<?php

namespace routes;

use Web\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

use function routes\routefiles\routesAdmin;
use function routes\routefiles\loginRoutes;


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


Route::prefix('admin')->group(function() {
    Route::get('/overview', 'Web\OverviewController@showOverview')->middleware('CheckAdmin');
    Route::get('/overview/{article}', 'Web\OverviewController@handleClick')->middleware('CheckAdmin');
});

Route::resource('articles', ArticleController::class)->except([
    'index', 'show'
])->middleware('CheckAdmin');

Route::resource('articles', ArticleController::class)->only([
    'create', 'index', 'show', 'edit'
]);

//Route::resource('articles.comments', 'Web\CommentController')->only([
//    'store'
//]);

