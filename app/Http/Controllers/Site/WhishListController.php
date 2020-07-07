<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhishListController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'title'   => 'Meus Favoritos',
			'current' => 'whishlist',
		];

		return view('site.pages.whishlist')->with($params);
	}
}
