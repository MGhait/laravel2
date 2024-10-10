<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        
        RateLimiter::for('watch_limiter', function (Request $request) {
            return Limit::perMinute(5);
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));
            
            // with mcamara localization for all your routes
            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])
                ->prefix(LaravelLocalization::setLocale())
                ->group(base_path('routes/web.php'));
            

            // normal one
            // Route::middleware('web')
            //     ->prefix('admins')
            //     ->group(base_path('routes/admins.php'));
            
            // Route::middleware('web')
            //     ->prefix('merchant')
            //     ->group(base_path('routes/merchant.php'));
        });

        Route::pattern('id', '[0-9]+');

        // Route::bind('product', function(string $value){
        //     return Product::where('name', str_replace('-', ' ', $value))->firstOrFail();
        // });
    }
}
