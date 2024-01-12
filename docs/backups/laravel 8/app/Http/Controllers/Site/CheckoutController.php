<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'title'   => ['Finalizar Compra'],
			'current' => 'checkout',
		];

		return view('site.pages.checkout')->with($params);
	}
}
