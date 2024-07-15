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
            ], 'datetime');
            $this->publishes([
                __DIR__ . '/../src/Helpers/StringHelper.php' => app_path('Helpers/StringHelper.php'),
            ], 'string');
            $this->publishes([
                __DIR__ . '/../src/Helpers/PaginateHelper.php' => app_path('Helpers/PaginateHelper.php'),
            ], 'paginator');
        }
    }
}
