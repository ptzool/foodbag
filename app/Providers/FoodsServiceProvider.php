<?php namespace Gocompose\Foodbag\Providers;

use Illuminate\Support\ServiceProvider;

class FoodsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Gocompose\Foodbag\Contracts\Repositories\FoodsRepositoryInterface',
            'Gocompose\Foodbag\Repositories\FoodsRepositoryEloquent'
        );
    }
}