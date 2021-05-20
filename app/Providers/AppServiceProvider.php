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
        Interfaces\UserServiceInterface::class => Production\UserService::class,
        Interfaces\TimeSheetServiceInterface::class => Production\TimeSheetService::class,
        Interfaces\TaskServiceInterface::class => Production\TaskService::class,
        Interfaces\FileUploadServiceInterface::class => Production\FileUploadService::class,

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
