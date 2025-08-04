<?php

namespace App\Providers;
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
    // Cargar la configuración una sola vez
    $settings = Setting::first();

    // Compartir con todas las vistas
    View::share('siteSettings', $settings);
    }
}
