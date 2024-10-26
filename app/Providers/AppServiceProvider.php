<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Campuses;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Gate::define('admin', function (User $user) {
            return $user->positions->name === 'admin';
        });
        View::composer('*', function ($view) {
            if (Auth::guard('participant')->check()) {
                $peserta = Auth::guard('participant')->user();
                $campus = $peserta->campuses;
                $view->with('campus', $campus);
            }
        });
    }
}
