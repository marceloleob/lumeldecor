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
		$params = SearchService::getProducts($type, $search);

		$params['page']  = 'material';
		$params['title'] = 'Cerâmicas';

		return view('site.pages.product')->with($params);
	}
}


/*
"id" => 4
"product_id" => 1
"product_size_id" => 3
"supplier_id" => 1
"code" => "LM0203000010000510G"
"picture" => "2020-06-24-5ef3dbd6d9b48.jpeg"
"p_price" => "26.40"
"s_price" => "54,00"
"launch" => ""
"status" => 1
"productId" => 1
"productName" => "Bandeja de Cerâmica Lisa"
"size" => "G"
"tooltip" => "Azul Céu"
"background" => "background-color: #87CEFA;"
]
*/
