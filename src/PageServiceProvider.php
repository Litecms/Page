<?php

namespace Litecms\Page;

use Illuminate\Support\ServiceProvider;
use Litecms\Page\Pages;

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
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'page');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'page');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();
        $this->registerBindings();
        $this->registerFacade();
        //$this->registerCommands();

        $this->app->register(\Litecms\Page\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Page\Providers\RouteServiceProvider::class);
        // $this->app->register(\Litecms\Page\Providers\EventServiceProvider::class);
        // $this->app->register(\Litecms\Page\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade() {
        $this->app->bind('litecms.page', function($app)
        {
            return $this->app->make(Pages::class);
        });
    }

    /**
     * Register the bindings for the service provider.
     *
     * @return void
     */
    public function registerBindings() {
                // Bind Page to repository
        $this->app->bind(
            'Litecms\Page\Interfaces\PageRepositoryInterface',
            \Litecms\Page\Repositories\Eloquent\PageRepository::class
        );
    }


    /**
     * Merges user's and page's configs.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'litecms.page'
        );
    }

    /**
     * Register scaffolding command
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Litecms\Page\Commands\Page::class,
            ]);
        }
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.page'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('litecms/page.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../resources/views' => base_path('resources/views/vendor/page')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../resources/lang' => base_path('resources/lang/vendor/page')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}