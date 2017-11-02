<?php

// Admin routes for module
Route::group(['prefix' => set_route_guard('web') . '/page'], function () {
    Route::resource('page', 'PageResourceController');
});

// Public routes for module
Route::get('/{slug}.html', 'PagePublicController@getPage');
