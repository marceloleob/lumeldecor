<?php

namespace App\Providers;

use Collective\Html\HtmlServiceProvider;
use App\Helpers\Macros;

class MacroServiceProvider extends HtmlServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
		parent::register();

		$this->app->singleton('form', function ($app) {
			$form = new Macros($app['html'], $app['url'], $app['view'], $app['session.store']->token());
			return $form->setSessionStore($app['session.store']);
		});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
	}
}
