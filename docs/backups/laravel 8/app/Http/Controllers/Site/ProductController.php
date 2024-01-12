<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	/**
	 * Product List
	 *
	 * @param string $module
	 * @param string $search
	 * @return Response
	 */
	public function show($module, $search)
	{
		$this->setSession('module', $module);
		$this->setSession('search', $search);

		$params = SearchService::productList($module, $search);

		return view('site.pages.product', ['current' => $search])->with($params);
	}

	/**
	 * Product Detail
	 *
	 * @param string $slug
	 * @return Response
	 */
	public function detail($slug)
	{
		$params = SearchService::productDetail($slug);

		return view('site.pages.product-detail', ['current' => session('search')])->with($params);
	}
}
