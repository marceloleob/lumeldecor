<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StockRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ReasonRepository;
use App\Repositories\StockRepository;
use App\Services\StockService;
use Illuminate\Http\Request;

class StockController extends Controller
{
	/**
	 * @var StockRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param StockRepository $repository
	 */
	public function __construct(StockRepository $repository)
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

		return view('admin.pages.stock-list', ['page' => 'stock'])->with($params);
	}

    /**
     * Show the history of item stock.
     *
     * @param  int  $id
     * @return View
     */
	public function show($itemId)
	{
		$history = $this->repository->findByItemId($itemId);

		return view('admin.pages.stock-show', ['page' => 'stock'])->with('show', $history);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
		$params = [
			'data' => $this->repository->findById($id),
			'optionsreason' => (new ReasonRepository())->options('I'),
		];

		return view('admin.pages.stock-form-create', ['page' => 'stock'])->with($params);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StockRequest  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function store(StockRequest $request)
	{
		// save
		$entity = StockService::store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar o estoque, tente novamente!');
		}

		return redirect()->route('stock.list')->with('success', 'Estoque atualizado com sucesso!');
	}
}
