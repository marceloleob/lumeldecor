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
	 * @return void
	 */
	public function show($type, $search)
	{
		$params = SearchService::productList($type, $search);

		$params['page']  = 'material';
		$params['title'] = 'Cerâmicas';

		return view('site.pages.product')->with($params);
	}

	/**
	 * Product Detail
	 *
	 * @param string $slug
	 * @param string $sku
	 * @return void
	 */
	public function detail($slug, $sku)
	{
		$params = SearchService::productDetail($slug, $sku);

		$params['page']  = 'material';
		$params['title'] = 'Cerâmicas';

		return view('site.pages.product-detail')->with($params);
	}
}
