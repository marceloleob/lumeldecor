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
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$params = $this->repository->all($request->search);

		return view('admin.pages.offer-promotion-list', ['page' => 'promotion'])->with($params);
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
			'optionsproduct'  => (new ProductRepository())->options(),
		];

		return view('admin.pages.offer-promotion-form-create', ['page' => 'promotion'])->with($params);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  OfferPromotionRequest  $request
     * @return Response
     */
    public function store(OfferPromotionRequest $request)
    {
		// save
		$entity = $this->repository->store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar oferta, tente novamente!');
		}

        return redirect()->route('promotion.list')->with('success', 'Oferta cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * Update the specified resource in storage.
     *
     * @param  OfferPromotionRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(OfferPromotionRequest $request, $id)
    {
		// save
		$entity = $this->repository->store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar oferta, tente novamente!');
		}

        return redirect()->route('promotion.list')->with('success', 'Oferta atualizada com sucesso!');
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
