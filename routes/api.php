<?php
// Guard routes for pages
Route::prefix('api/{guard}/page')->group(function () {
    Route::resource('page', 'PageResourceController');
});

// Public routes for pages
Route::get('/{slug}.html', 'PagePublicController@getPage');