<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	/**
	 * @var ProductRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ProductRepository $repository
	 */
	public function __construct(ProductRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Product List
	 *
	 * @param string $type
	 * @param string $search
	 * @return Response
	 */
	public function show($type, $search)
	{
		$params = SearchService::productList($type, $search);

		return view('site.pages.product')->with($params);
	}

	/**
	 * Product Detail
	 *
	 * @param string $type
	 * @param string $search
	 * @param string $slug
	 * @param string $size
	 * @param string $sku
	 * @return Response
	 */
	public function detail($type, $search, $slug, $size, $sku = null)
	{
		$params = SearchService::productDetail($type, $search, $slug, $size, $sku);

		return view('site.pages.product-detail')->with($params);
	}
}
