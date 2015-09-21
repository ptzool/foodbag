<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FoodsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\FoodsRepositoryInterface',
            'App\Repositories\FoodsRepositoryEloquent'
        );
    }
}