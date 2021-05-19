<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces;
use App\Services\Production;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    protected $services = [
        Interfaces\UserServiceInterface::class => Production\UserService::class
    ];

    public function register()
    {
        foreach ($this->services as $inteface => $service) {
            $this->app->singleton($inteface, $service);
        }
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
