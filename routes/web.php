<?php
// Guard routes for pages
Route::prefix(set_route_guard('web'))->group(function () {
	Route::prefix('page')->group(function () {
		Route::resource('page', 'PageResourceController');
	});
});


// Public routes for pages
Route::get('/{slug}.html', 'PagePublicController@getPage');