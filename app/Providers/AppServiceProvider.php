<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('isUserAdmin', function() {
            if(Auth::check()) {
                return Auth::user()->is_admin === 1 ? true : false;
            }
            return false;
        });

        Blade::if('isUserWorker', function() {
            if(Auth::check()) {
                return Auth::user()->is_admin === 0 ? true : false;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
