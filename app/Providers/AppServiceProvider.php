<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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
        Vite::prefetch(concurrency: 3);

        // We will pass the app name across all pages using Inertia 
        Inertia::share([
            'auth' => function() {
                return [
                    'user' => Auth::user(),
                ];
            },

            'flash' => function() {
                return [
                    'success' => session('success'),
                    'error' => session('error'),
                ];
            }
        ]);
        
    }
    
}
