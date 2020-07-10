<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'title'   => ['Termos e Condições'],
			'current' => 'terms',
		];

		return view('site.pages.terms')->with($params);
	}
}
