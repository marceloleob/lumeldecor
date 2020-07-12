<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::pattern('id', '[0-9]+');
        Route::pattern('productId', '[0-9]+');
		Route::pattern('productSizeId', '[0-9]+');
		Route::pattern('itemId', '[0-9]+');
		Route::pattern('picture', '[0-9a-z\-]*\.(jpg|jpeg|gif|png)');

        Route::pattern('table', '\b(busca|material|categoria|tons|tema)\b');
        Route::pattern('search', '[a-zA-Z\-]+');
		Route::pattern('slug', '[a-z\-]+');
		Route::pattern('qtdy', '[0-9]+');

        // Route::pattern('size', '[A-Z\-]+');
        // Route::pattern('sku', '^(LM){1}([0-9]){15}([P0G])([PMGU])');
        // Route::pattern('sku', '^(LM){1}([0-9]){4}([P0G])([PMGU])([0-9]){6}');

		Route::pattern('qtdy', '[0-9]+');

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
