<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Use require_once to ensure the helper file is loaded
        require_once app_path('Helpers/helper.php');
        
        $home_page_data = \globalData();
        View::share('home_page_data', $home_page_data);

        View::composer('layouts.website.header', function ($view) {
            $view->with(
                'navCollaborators',
                \App\Models\Collaborator::where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('title')
                    ->get(['id', 'title', 'slug', 'image'])
            );
        });
    }
}

