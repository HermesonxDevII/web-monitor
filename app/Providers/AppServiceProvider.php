<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\{ CheckObserver };
use App\Models\{ Check };

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
        Check::observe(CheckObserver::class);
    }
}
