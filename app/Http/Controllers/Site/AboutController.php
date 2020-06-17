<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'page'  => 'about',
			'title' => 'Sobre nós',
		];

		return view('site.pages.about')->with($params);
	}
}
