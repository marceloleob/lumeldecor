<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\Http\Controllers';
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
		// admin
        Route::pattern('id', '[0-9]+');
        Route::pattern('productId', '[0-9]+');
		Route::pattern('productSizeId', '[0-9]+');
		Route::pattern('itemId', '[0-9]+');
		Route::pattern('picture', '[0-9a-z\-]*\.(jpg|jpeg|gif|png)');

		// site
        Route::pattern('module', '\b(busca|material|categoria|tons|tema)\b');
        Route::pattern('search', '[a-zA-Z\-]+');
		Route::pattern('slug', '[a-z\-]+');
		Route::pattern('qtdy', '[0-9]+');

        // Route::pattern('size', '[A-Z\-]+');
        // Route::pattern('sku', '^(LM){1}([0-9]){15}([P0G])([PMGU])');
        // Route::pattern('sku', '^(LM){1}([0-9]){4}([P0G])([PMGU])([0-9]){6}');
        // --

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
