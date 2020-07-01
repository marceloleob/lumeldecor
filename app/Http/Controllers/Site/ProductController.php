<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ZipCodeRequest;
use App\Repositories\ProductRepository;
use App\Services\SearchService;
use App\Services\ShippingService;
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
	 * @param string $table
	 * @param string $slug
	 * @return Response
	 */
	public function show($table, $slug)
	{
		$params = SearchService::productList($table, $slug);

		return view('site.pages.product')->with($params);
	}

	/**
	 * Product Detail
	 *
	 * @param string $table
	 * @param string $slug
	 * @param string $product
	 * @param string $size
	 * @param string $sku
	 * @return Response
	 */
	public function detail($table, $slug, $product, $size, $sku = null)
	{
		$params = SearchService::productDetail($table, $slug, $product, $size, $sku);

		return view('site.pages.product-detail')->with($params);
	}

	/**
	 * Return calc of Correios
	 *
	 * @param ZipCodeRequest $request
	 * @return array
	 */
	public function calculator(ZipCodeRequest $request)
	{
		return ShippingService::handle($request->all());
	}
}
