<?php
// Guard routes for pages
Route::prefix('api/{guard}/page')->group(function () {
    Route::resource('page', 'PageAPIController');
});

// Public routes for pages
Route::get('/{slug}.html', 'PagePublicController@getPage');