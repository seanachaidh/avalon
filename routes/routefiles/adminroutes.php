<?php
namespace routes\routefiles;

use Illuminate\Support\Facades\Route;


function routesAdmin() {
    Route::prefix('/admin')->group(function() {
        Route::get('/overview', 'Web\OverviewController@showOverview');
        Route::get('/overview/{article}', 'Web\OverviewController@handleClick');
    });
}
