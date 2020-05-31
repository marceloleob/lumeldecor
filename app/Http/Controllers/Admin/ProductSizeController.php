<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductSizeRequest;
use App\Repositories\ItemRepository;
use App\Repositories\ProductSizeRepository;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$params = [
			'data'  => $this->repository->findById($id),
			'items' => (new ItemRepository)->findByProductSize($id),
		];

		return view('admin.pages.product-size-form-update', ['page' => 'product-size'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSizeRequest $request, $id)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product.edit', $request->product_id)->with($response);
	}
}
