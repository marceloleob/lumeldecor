<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
	/**
	 * Home page
	 *
	 * @return void
	 */
	public function index()
	{
		$params = [
			'page'  => 'faq',
			'title' => 'Perguntas Frequentes',
		];

		return view('site.pages.faq')->with($params);
	}
}
