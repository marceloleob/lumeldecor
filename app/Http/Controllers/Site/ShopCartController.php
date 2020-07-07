<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'title'   => 'Carrinho',
			'current' => 'shopcart',
		];

		return view('site.pages.shopcart')->with($params);
	}
}
