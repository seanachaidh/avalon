<?php
namespace routes\routefiles;

use Illuminate\Support\Facades\Route;

function loginRoutes() {
    Route::get('/login', 'Web\MyLoginController@showLogin');
    Route::post('/login','Web\MyLoginController@authenticate');
    Route::get('/logout', 'Web\MyLoginController@logout');
}
