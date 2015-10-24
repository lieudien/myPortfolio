<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.navigator', function($view) {
            $loginData = array();
            if (Auth::user())
            {
                $loginData['loginText'] = "Log out";
                $loginData['url'] = '/auth/logout';
            } else
            {
                $loginData['loginText'] = "Log in";
                $loginData['url'] = 'auth/login';
            }
            $view->with('loginData', $loginData);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
