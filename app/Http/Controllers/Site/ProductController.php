<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	/**
	 * Product List
	 *
	 * @param string $slug
	 * @return void
	 */
	public function show($slug)
	{
		$params = [
			'page'  => 'product',
			'title' => 'Produtos',
		];

		return view('site.pages.product')->with($params);
	}
}
