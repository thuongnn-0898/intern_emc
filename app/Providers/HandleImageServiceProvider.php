<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HandleImageService;

class HandleImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('product', HandleImageService::class);

        $this->app->booting(function (){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('HandleImageService', 'App\Services\HandleImageService');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
