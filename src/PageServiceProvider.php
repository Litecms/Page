<?php

namespace Litecms\Page;

use Illuminate\Support\ServiceProvider;
use Litecms\Page\Models\Page;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'page');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'page');

        $this->publishResources();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('page', function ($app) {
            return $this->app->make('Litecms\Page\Page');
        });

        $this->app->bind(
            'Litecms\Page\Interfaces\PageRepositoryInterface',
            \Litecms\Page\Repositories\Eloquent\PageRepository::class
        );

        $this->app->register(\Litecms\Page\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Page\Providers\EventServiceProvider::class);
        $this->app->register(\Litecms\Page\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['page'];
    }

    /**
     * Publish configuration file.
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__.'/../config/config.php' => config_path('litecms/page.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__.'/../resources/views' => base_path('resources/views/vendor/page')], 'view');

        // Publish language files
        $this->publishes([__DIR__.'/../resources/lang' => base_path('resources/lang/vendor/page')], 'lang');

        // Publish language files
        $this->publishes([__DIR__.'/../public' => base_path('public')], 'public');

        // Publish migrations
        $this->publishes([__DIR__.'/../database/migrations' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__.'/../database/seeds' => base_path('database/seeds')], 'seeds');
    }

}
