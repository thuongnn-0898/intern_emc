<?php

namespace App\Providers;

use App\Services\HandleUserService;
use Illuminate\Support\ServiceProvider;

class HandleUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('user', HandleUserService::class);

        $this->app->booting(function (){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('HandleUserService', 'App\Services\HandleUserService');
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
