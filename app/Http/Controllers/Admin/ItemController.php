<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Repositories\ColorRepository;
use App\Repositories\ItemRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\ThemeRepository;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	/**
	 * @var ItemRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ItemRepository $repository
	 */
	public function __construct(ItemRepository $repository)
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
			'data'            => ItemService::findById($id),
			'optionscolor'    => (new ColorRepository())->options(),
			'optionstheme'    => (new ThemeRepository())->options(),
			'optionssupplier' => (new SupplierRepository())->options(),
		];

		return view('admin.pages.item-form-update', ['page' => 'item'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
		// save
		$response = ItemService::update($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product-size.edit', $request->product_size_id)->with($response);
	}
}
