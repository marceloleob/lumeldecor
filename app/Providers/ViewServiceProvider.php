<?php

namespace App\Providers;

use App\Services\MenuService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		// Retorna a localizacao do usuario
		View::composer('*', function ($view)
		{
			$view->with('locale', str_replace('_', '-', strtolower(App::getLocale())));
		});

		// binda o site para renderizar o menu
		View::composer('site.*', function($view)
		{
			$view->with('menu', MenuService::render());
		});
    }
}
