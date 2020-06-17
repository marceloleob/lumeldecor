<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'page'  => 'contact',
			'title' => 'Contato',
		];

		return view('site.pages.contact')->with($params);
	}
}
