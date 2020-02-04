<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('product', function($app){
            return new ProductService();
        });

        $this->app->booting(function (){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('ProductService', 'App\Services\ProductService');
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
