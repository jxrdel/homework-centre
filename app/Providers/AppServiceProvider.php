<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //Gives SuperAdmin access for all gates
        Gate::before(function ($user, $ability){
            if ($user->IsSuperAdmin){
                return true;
            }
        });
        
        Gate::define('view-all-students', function (User $user) {
            return $user->IsAdmin;
        });
        
        Gate::define('view-all-parents', function (User $user) {
            return $user->IsAdmin;
        });
        
        Gate::define('view-admin-pages', function (User $user) {
            return $user->IsAdmin;
        });
    }
}
