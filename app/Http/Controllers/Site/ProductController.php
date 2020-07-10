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
	 * @param string $search
	 * @return Response
	 */
	public function show($table, $search)
	{
		$params = SearchService::productList($table, $search);

		return view('site.pages.product')->with($params);
	}

	/**
	 * Product Detail
	 *
	 * @param string $table
	 * @param string $search
	 * @param string $slug
	 * @return Response
	 */
	public function detail($table, $search, $slug)
	{
		$params = SearchService::productDetail($table, $search, $slug);
// dd($params);
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
