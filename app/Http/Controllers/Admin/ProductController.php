<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductSizeRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\ThemeRepository;
use App\Repositories\ToneRepository;
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
		$params = $this->repository->all($request->search, $request->material_id, $request->category_id);
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
			'optionstheme'    => (new ThemeRepository())->options(),
			'optionstone'     => (new ToneRepository())->options(),
			'optionssupplier' => (new SupplierRepository())->options(),
		];

		return view('admin.pages.product-form-create', ['page' => 'product'])->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest  $request
     * @return Response
     */
    public function store(ProductCreateRequest $request)
    {
		// save
		$response = ProductService::create($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product.list')->with('success', 'Produto cadastrado com sucesso!');
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
			'items'           => (new ProductSizeRepository)->findByProduct($productId),
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
		];

		return view('admin.pages.product-form-update', ['page' => 'product'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest  $request
     * @param  int  $productId
     * @return Response
     */
    public function update(ProductUpdateRequest $request, $productId)
    {
		// save
		$response = ProductService::update($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
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
