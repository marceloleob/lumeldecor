<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Repositories\ItemRepository;
use App\Repositories\ProductSizeRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\ThemeRepository;
use App\Repositories\ToneRepository;
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
			'data'            => $this->repository->findByIds($productId, $productSizeId),
			'items'           => $this->repository->findByProductSizeId($productSizeId),
			'productSize'     => (new ProductSizeRepository)->findById($productSizeId),
			'optionstone'     => (new ToneRepository())->options(),
			'optionstheme'    => (new ThemeRepository())->options(),
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
		$entity = ItemService::store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', $entity['message']);
		}

        return redirect()->route('item.create', [$request->product_id, $request->product_size_id])->with('success', 'Item do produto cadastrado com sucesso!');
	}

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $itemId
     * @param  int  $productId
     * @param  int  $productSizeId
     * @return Response
     */
    public function edit($itemId, $productId, $productSizeId)
    {
		$params = [
			'data'            => $this->repository->findByIds($productId, $productSizeId, $itemId),
			'items'           => $this->repository->findByProductSizeId($productSizeId),
			'optionstone'     => (new ToneRepository())->options(),
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
		$entity = ItemService::store($request->all(), $itemId);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', $entity['message']);
		}

		return redirect()->route('item.create', [$request->product_id, $request->product_size_id])->with('success', 'Item do produto atualizado com sucesso!');
	}

    /**
     * Toggle the status storage.
     *
     * @param  int  $itemId
     * @param  int  $productId
     * @param  int  $productSizeId
     * @return Response
     */
    public function changeStatus($itemId, $productId, $productSizeId)
    {
        $response = $this->repository->changeStatus($itemId);

        return redirect()->route('item.create', [$productId, $productSizeId])->with($response);
    }
}
