<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	/**
	 * @var ItemRequest
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ItemRequest $repository
	 */
	public function __construct(ItemRequest $repository)
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
			'data'            => $this->repository->findById($id),
			'items'           => (new ProductSizeRepository)->findByProduct($id),
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
			// 'optionstheme'    => (new ThemeRepository())->options(),
			// 'optionscolor'    => (new ColorRepository())->options(),
			// 'optionssupplier' => (new SupplierRepository())->options(),
		];

		return view('admin.pages.product-form-update', ['page' => 'product'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
		// save
		$response = ProductService::update($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product.list')->with($response);
	}

    /**
     * Toggle the status storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function changeStatus($id)
    {
        $response = $this->repository->changeStatus($id);

        return redirect()->route('product.list')->with($response);
    }
}
