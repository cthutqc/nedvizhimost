<?php

namespace App\Providers;

use App\Models\Advantage;
use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
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

        View::composer(['components.header', 'components.footer', 'components.mobile-home-categories', 'components.mobile-menu'], function ($view) {
            $view->with('categories', Category::all());
            $view->with('pages', Page::where('show_in_menu', true)->get());
            $view->with('services', Service::all());
            $view->with('phone', Setting::where('code', 'phone')->first()?->value);
        });

        View::composer(['components.advantages'], function ($view){
           $view->with('advantages', Advantage::query()->with('media')->get());
        });
    }
}
