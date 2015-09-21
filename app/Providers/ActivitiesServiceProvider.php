<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActivitiesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\ActivitiesRepositoryInterface',
            'App\Repositories\ActivitiesRepositoryEloquent'
        );
    }
}