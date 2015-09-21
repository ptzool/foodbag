<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\DashboardRepositoryInterface',
            'App\Repositories\DashboardRepository'
        );
    }
}