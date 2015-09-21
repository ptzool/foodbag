<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WeightServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\WeightRepositoryInterface',
            'App\Repositories\WeightRepositoryEloquent'
        );
    }
}