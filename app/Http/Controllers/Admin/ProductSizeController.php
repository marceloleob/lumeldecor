<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductSizeRequest;
use App\Repositories\ItemRepository;
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
		return view('admin.pages.product-size-form-create', ['page' => 'product-size'])->with('product_id', $productId);
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
		$response = ProductSizeService::store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with('danger', 'Erro ao cadastrar o tamanho do produto, tente novamente!');
        }

        return redirect()->route('product.edit', $request->product_id)->with('success', 'Tamanho do produto cadastrado com sucesso!');
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
			'items' => (new ItemRepository)->findByProductSizeId($productSizeId),
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
		$response = ProductSizeService::store($request->all(), $productSizeId);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with('danger', 'Erro ao atualizar o tamanho do produto, tente novamente!');
        }

        return redirect()->route('product.edit', $request->product_id)->with('success', 'Tamanho do produto atualizado com sucesso!');
	}
}
