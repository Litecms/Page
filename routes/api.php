<?php
// Guard routes for pages
Route::prefix('{guard}/page')->group(function () {
    Route::get('page/form/{element}', 'PageResourceController@form');
    Route::resource('page', 'PageResourceController');
});
// Public routes for pages
Route::get('/{slug}.html', 'PagePublicController@getPage');

if (Trans::isMultilingual()) {
    Route::group(
        [
            'prefix' => '{trans}',
            'where' => ['trans' => Trans::keys('|')],
        ],
        function () {
            // Guard routes for pages
            Route::prefix('{guard}/page')->group(function () {
                Route::get('page/form/{element}', 'PageResourceController@form');
                Route::resource('page', 'PageResourceController');
            });
            // Public routes for pages
            Route::get('/{slug}.html', 'PagePublicController@getPage');
        }
    );
}
