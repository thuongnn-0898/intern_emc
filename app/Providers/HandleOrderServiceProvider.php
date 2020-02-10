<?php

namespace App\Providers;

use App\Models\Order;
use App\Services\HandleOrderService;
use Illuminate\Support\ServiceProvider;

class HandleOrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('order', HandleOrderService::class);

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
