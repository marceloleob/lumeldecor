<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Waiting page
	 *
	 * @return void
	 */
	public function waiting()
	{
		return view('site.pages.waiting');
	}

	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'title'   => '',
			'current' => 'home',
		];

		return view('site.pages.home')->with($params);
	}
}
