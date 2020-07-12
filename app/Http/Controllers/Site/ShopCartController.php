<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ShopCartService;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
	/**
	 * Shop Cart List
	 *
	 * @param string $table
	 * @param string $search
	 * @param string $slug
	 * @param integer $qtdy
	 * @return Response
	 */
	public function index($table, $search, $slug, $qtdy = 1)
	{
		$params = ShopCartService::store($table, $search, $slug, $qtdy);

		return view('site.pages.shopcart')->with($params);
	}
}
