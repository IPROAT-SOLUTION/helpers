<?php

namespace Iproat\Helpers;

class HelperServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->offerPublishing();
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
                __DIR__ . '/../src/Helpers/DateTimeHelper.php' => app_path('Helpers/DateTimeHelper.php'),
            ], 'helpers');
        }
    }
}
