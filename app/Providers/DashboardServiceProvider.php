<?php namespace Gocompose\Foodbag\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Gocompose\Foodbag\Contracts\Repositories\DashboardRepositoryInterface',
            'Gocompose\Foodbag\Repositories\DashboardRepository'
        );
    }
}