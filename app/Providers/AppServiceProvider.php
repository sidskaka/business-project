<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', function (User $user) {
            return $user->hasRole('admin');
        });
        Gate::define('manager', function (User $user) {
            return $user->hasRole('manager');
        });
        Gate::define('employe', function (User $user) {
            return $user->hasRole('employe');
        });

        Gate::after(function (User $user) {
            return $user->hasRole('superadmin');
        });
    }
}
