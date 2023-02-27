<?php

// Routes for page.

// Guard routes for page
Route::prefix('{guard}/page')->group(function () {

    Route::resource('page', 'PageResourceController');
});



// Public routes for page
Route::get('pages/', 'PagePublicController@index');
Route::get('page/{slug?}', 'PagePublicController@show');
