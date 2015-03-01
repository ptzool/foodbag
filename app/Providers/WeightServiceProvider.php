<?php namespace Gocompose\Foodbag\Providers;

use Illuminate\Support\ServiceProvider;

class WeightServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Gocompose\Foodbag\Contracts\Repositories\WeightRepositoryInterface',
            'Gocompose\Foodbag\Repositories\WeightRepositoryEloquent'
        );
    }
}