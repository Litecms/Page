<?php
// Guard routes for pages
Route::prefix(trans_setlocale())->group(function () {
    Route::prefix(set_route_guard('api'))->group(function () {
        Route::prefix('page')->group(function () {
            Route::resource('page', 'PageResourceController');
        });
    });
});

// Public routes for pages
Route::get('/{slug}.html', 'PagePublicController@getPage');