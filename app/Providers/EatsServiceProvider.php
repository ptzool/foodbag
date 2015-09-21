<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EatsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\EatsRepositoryInterface',
            'App\Repositories\EatsRepositoryEloquent'
        );
    }
}