<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\Task;
use App\Policies\TaskPolicy;
use App\Models\TimeSheet;
use App\Policies\TimeSheetPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // User::class => UserPolicy::class,
        // Task::class => TaskPolicy::class,
        // TimeSheet::class => TimeSheetPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin','manager']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin', 'manager']);
        });
        Gate::define('delete-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });
    }
}
