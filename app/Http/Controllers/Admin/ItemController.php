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
     * Show the form for creating a new resource.
     *
	 * @param  int  $productId
	 * @param  int  $productSizeId
     * @return Response
     */
    public function create($productId, $productSizeId)
    {
		$params = [
			'product_id'      => $productId,
			'product_size_id' => $productSizeId,
			'optionstheme'    => (new ThemeRepository())->options(),
			'optionscolor'    => (new ColorRepository())->options(),
			'optionssupplier' => (new SupplierRepository())->options(),
		];

		return view('admin.pages.item-form-create', ['page' => 'item'])->with($params);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  ItemRequest  $request
     * @return Response
     */
    public function store(ItemRequest $request)
    {
		// save
		$response = ItemService::store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product-size.edit', $request->product_id)->with('success', 'Item do produto cadastrado com sucesso!');
	}

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $itemId
     * @return Response
     */
    public function edit($itemId)
    {
		$params = [
			'data'            => ItemService::findById($itemId),
			'optionscolor'    => (new ColorRepository())->options(),
			'optionstheme'    => (new ThemeRepository())->options(),
			'optionssupplier' => (new SupplierRepository())->options(),
		];

		return view('admin.pages.item-form-update', ['page' => 'item'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $itemId
     * @return Response
     */
    public function update(ItemRequest $request, $itemId)
    {
		// save
		$response = ItemService::store($request->all(), $itemId);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product-size.edit', $request->product_size_id)->with('success', 'Item do produto atualizado com sucesso!');
	}

    /**
     * Toggle the status storage.
     *
     * @param  int  $itemId
     * @param  int  $productSizeId
     * @return Response
     */
    public function changeStatus($itemId, $productSizeId)
    {
        $response = $this->repository->changeStatus($itemId);

        return redirect()->route('product-size.edit', $productSizeId)->with($response);
    }
}
