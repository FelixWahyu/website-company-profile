<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['*'], function ($view) {
            // Ambil data hanya sekali dan cache untuk performa
            $settings = cache()->remember('settings', 60 * 60, function () {
                return Setting::pluck('value', 'key')->all();
            });
            $view->with('settings', $settings);
        });
    }
}
