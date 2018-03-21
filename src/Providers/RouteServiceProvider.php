<?php

namespace Litecms\Page\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;
use Litecms\Page\Models\Page;
use Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Litecms\Page\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/page/page/*')) {
            Route::bind('page', function ($id) {
                $page = $this->app->make(\Litecms\Page\Interfaces\PageRepositoryInterface::class);
                return $page->findOrNew($id);
            });
        }

    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        // $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        if(request()->segment(1) == 'api' || request()->segment(2) == 'api') return;

        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
            'prefix'     => trans_setlocale(),
        ], function ($router) {
            require (__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the package.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        if(request()->segment(1) != 'api' && request()->segment(2) != 'api') return;
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => trans_setlocale() . '/api',
        ], function ($router) {
            Route::group(['prefix' => 'api'], function ($router) {
                    require (__DIR__ . '/../../routes/api.php');
            });
        });
    }

}
