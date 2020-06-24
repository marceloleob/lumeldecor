<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
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
	 * Display a listing of the resource.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
    public function index(Request $request)
    {
		$params = $this->repository->all($request);
		$params['optionsmaterial'] = (new MaterialRepository())->options();
		$params['optionscategory'] = (new CategoryRepository())->options();

		return view('admin.pages.product-list', ['page' => 'product'])->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$params = [
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
		];

		return view('admin.pages.product-form-create', ['page' => 'product'])->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest  $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
		// save
		$entity = ProductService::store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar o produto, tente novamente!');
		}

        return redirect()->route('product-size.create', $entity->id)->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $productId
     * @return Response
     */
    public function edit($productId)
    {
		$params = [
			'data'            => $this->repository->findById($productId),
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
		];

		return view('admin.pages.product-form-update', ['page' => 'product'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
		// save
		$entity = ProductService::store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar o produto, tente novamente!');
		}

		return redirect()->route('product.list')->with('success', 'Produto atualizado com sucesso!');
	}

    /**
     * Toggle the status storage.
     *
     * @param  int  $productId
     * @return Response
     */
    public function changeStatus($productId)
    {
        $response = $this->repository->changeStatus($productId);

        return redirect()->route('product.list')->with($response);
    }
}
