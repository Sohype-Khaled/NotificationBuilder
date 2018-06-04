<?php

namespace NotificationBuilder;

use Illuminate\Support\ServiceProvider;

class NotificationBuilderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }

    private function registerPublishables()
    {
         $basePath = dirname(__DIR__);

         $Publishables = [
            'config'    =>    [
                "$basePath/src/config" => config_path('config'),

            ],
            'migrations'    =>    [
                "$basePath/src/database/migrations" => database_path('migrations'),

            ],
            'seeds' => [
                "$basePath/src/database/seeds" => database_path('seeds')
            ],
         ];

         foreach ($Publishables as $group => $paths) {
             $this->publishes($paths,$group);
         }
    }
}
