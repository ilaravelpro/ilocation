<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(ilocation_path('config/ilocation.php'), 'ilaravel.ilocation');

        if($this->app->runningInConsole())
        {
            if (ilocation('database.migrations.include', true)) $this->loadMigrationsFrom(ilocation_path('database/migrations'));
        }
    }

    public function register()
    {
        parent::register();
    }
}
