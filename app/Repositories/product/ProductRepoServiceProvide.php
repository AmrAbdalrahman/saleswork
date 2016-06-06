<?php

namespace App\Repositories\Product;

use Illuminate\Support\ServiceProvider;

class ProductRepoServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Product\ProductInterface', 'App\Repositories\Product\ProductRepository');
    }
}