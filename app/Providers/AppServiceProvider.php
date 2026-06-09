<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CompanyProfile;

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
        // DB available na ho (CI build, fresh install before migrate) to
        // crash na ho — gracefully null share karo.
        try {
            View::share('profile', CompanyProfile::first());
        } catch (\Throwable $e) {
            View::share('profile', null);
        }
    }
}
