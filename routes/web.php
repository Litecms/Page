<?php
// Guard routes for pages
Route::group(['prefix' => set_route_guard('web')], function ($router) {

	Route::group(['prefix' => 'page'], function ($router) {
	    Route::resource('page', 'PageResourceController');
	});
});
// Public routes for pages
Route::get('/{slug}.html', 'PagePublicController@getPage');
