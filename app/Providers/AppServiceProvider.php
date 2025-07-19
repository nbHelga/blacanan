<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Share footer data with all views
        View::composer('layouts.footer', function ($view) {
            $footer = \App\Models\Footer::with('kontak')->first();
            $view->with('footer', $footer);
        });
    }
}
