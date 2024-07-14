<?php

namespace Iproat\Helpers;

class HelperServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->offerPublishing();
        $this->registerCommands();
    }

    /**
     * Setup the configuration for Helpers.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(__DIR__ . '/../app/Http/Helper/DateTimeHelper.php', 'helper');
    }

    /**
     * Setup the resource publishing group for Helpers.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../app/Http/Helper/DateTimeHelper.php' => app_path('Http/Helper/DateTimeHelper.php'),
            ], 'helper');
        }
    }

    /**
     * Register the Helpers commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                //
            ]);
        }
    }
}
