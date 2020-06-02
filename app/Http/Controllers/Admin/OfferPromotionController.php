<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferPromotionRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\OfferPromotionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;

class OfferPromotionController extends Controller
{
	/**
	 * @var OfferPromotionRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param OfferPromotionRepository $repository
	 */
	public function __construct(OfferPromotionRepository $repository)
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

		return view('admin.pages.offer-promotion-list', ['page' => 'promotion'])->with($params);
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
			'optionsproduct'  => (new ProductRepository())->options(),
		];

		return view('admin.pages.offer-promotion-form-create', ['page' => 'promotion'])->with($params);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferPromotionRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
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
			'optionsproduct'  => (new ProductRepository())->options(),
		];

		return view('admin.pages.offer-promotion-form-update', ['page' => 'promotion'])->with($params);
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

        return redirect()->route('promotion.list')->with($response);
    }
}
