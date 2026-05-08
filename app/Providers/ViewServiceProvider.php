<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Sharing companyName with all views
        View::composer('*', function ($view) {
            $companyName = null;
            if (Auth::check() && Auth::user()->hasRole('Company')) {
                $companyName = Auth::user()->administeredCompany ? Auth::user()->administeredCompany->name : 'No company associated';
            }
            $view->with('companyName', $companyName); // Share companyName with all views
        });
    }
}
