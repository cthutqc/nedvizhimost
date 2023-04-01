<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\Facades\View;
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
        if(app()->isProduction()) {
            \URL::forceScheme('https');
        }

        View::composer(['components.header', 'components.footer'], function ($view) {
            $view->with('categories', Category::all());
            $view->with('pages', Page::all());
        });
    }
}
