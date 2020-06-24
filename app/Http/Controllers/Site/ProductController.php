<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
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
	 * @param string $search
	 * @return void
	 */
	public function showByMaterial($search)
	{
		$params = $this->repository->getProductsByMaterial($search);

		$params['page']  = 'product';
		$params['title'] = 'Produtos';

		return view('site.pages.product')->with($params);
	}
}
