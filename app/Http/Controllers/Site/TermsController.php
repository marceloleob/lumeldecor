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
			'page'  => 'terms',
			'title' => 'Termos e Condições',
		];

		return view('site.pages.terms')->with($params);
	}
}
