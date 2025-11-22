<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

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
    public function boot()
    {
        // contoh throttles
        RateLimiter::for('login', function (Request $request) {
            $ip = $request->ip();
            $email = (string) $request->email;

            // Gabungkan IP dan email untuk mengurangi false positives
            return Limit::perMinute(5)->by($ip . $email)->response(function () {
                return response()->json(['message' => 'Too many login attempts. Wait 1 minute.'], 429);
            });
        });

        // global API limit per IP
        RateLimiter::for('global-api', function (Request $request) {
            return Limit::perMinute(300)->by($request->ip());
        });
    }
}
