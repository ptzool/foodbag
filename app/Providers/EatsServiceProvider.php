<?php namespace Gocompose\Foodbag\Providers;

use Illuminate\Support\ServiceProvider;

class EatsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Gocompose\Foodbag\Contracts\Repositories\EatsRepositoryInterface',
            'Gocompose\Foodbag\Repositories\EatsRepositoryEloquent'
        );
    }
}