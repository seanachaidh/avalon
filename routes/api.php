<?php

use Illuminate\Support\Facades\Route;
use Rest\ArticleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('articles', ArticleRestController::class)->except([
    'create', 'edit', 'index', 'show'
])->middleware('CheckAdmin');

Route::resource('articles', ArticleRestController::class)->only([
    'index', 'show'
]);
