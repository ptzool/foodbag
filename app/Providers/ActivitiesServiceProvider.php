<?php namespace Gocompose\Foodbag\Providers;

use Illuminate\Support\ServiceProvider;

class ActivitiesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Gocompose\Foodbag\Contracts\Repositories\ActivitiesRepositoryInterface',
            'Gocompose\Foodbag\Repositories\ActivitiesRepositoryEloquent'
        );
    }
}