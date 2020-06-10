<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductSizeRequest;
use App\Repositories\ProductSizeRepository;
use App\Services\ProductSizeService;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
	/**
	 * @var ProductSizeRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ProductSizeRepository $repository
	 */
	public function __construct(ProductSizeRepository $repository)
	{
		$this->repository = $repository;
	}

    /**
     * Show the form for creating a new resource.
     *
	 * @param  int  $productId
     * @return Response
     */
    public function create($productId)
    {
		$params = [
			'productId' => $productId,
			'items'     => (new ProductSizeRepository)->findByProductId($productId),
		];

		return view('admin.pages.product-size-form-create', ['page' => 'product-size'])->with($params);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductSizeRequest  $request
     * @return Response
     */
    public function store(ProductSizeRequest $request)
    {
		// save
		$entity = ProductSizeService::store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', $entity['message']);
		}

		$message = ['success' => 'Tamanho do produto cadastrado com sucesso!'];

		// caso adicionou um tamanho unico, redireciona para as cores
		if ($request->size === 'U') {
			return redirect()->route('item.create', [$request->product_id, $entity->id])->with($message);
		}

        return redirect()->route('product-size.create', $request->product_id)->with($message);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $productSizeId
     * @return Response
     */
    public function edit($productSizeId)
    {
		$params = [
			'data'  => $this->repository->findById($productSizeId),
			'items' => (new ProductSizeRepository)->findByProductSizeId($productSizeId),
		];

		return view('admin.pages.product-size-form-update', ['page' => 'product-size'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductSizeRequest  $request
     * @param  int  $productSizeId
     * @return Response
     */
    public function update(ProductSizeRequest $request, $productSizeId)
    {
		// save
		$entity = ProductSizeService::store($request->all(), $productSizeId);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', $entity['message']);
		}

        return redirect()->route('product-size.create', $request->product_id)->with('success', 'Tamanho do produto atualizado com sucesso!');
	}
}
