<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\ThemeRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends AdminController
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
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function index(Request $request)
    {
		$params = $this->repository->all($request->search);

		return view('admin.pages.product-list', ['page' => 'product'])->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$params = [
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
			'optionstheme'    => (new ThemeRepository())->options(),
			'optionscolor'    => (new ColorRepository())->options(),
			'optionssupplier' => (new SupplierRepository())->options(),
		];

		return view('admin.pages.product-form-create', ['page' => 'product'])->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
		// save
		$response = ProductService::store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('promotion.list')->with($response);
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
			'data' => $this->repository->findById($id),
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
			'optionstheme'    => (new ThemeRepository())->options(),
			'optionscolor'    => (new ColorRepository())->options(),
		];

		return view('admin.pages.product-form-update', ['page' => 'product'])->with($params);
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
