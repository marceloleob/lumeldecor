<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ProductRepository;
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
		$params = (new ProductRepository())->all($request->search);
		$params['optionsmaterial'] = (new MaterialRepository())->options();
		$params['optionscategory'] = (new CategoryRepository())->options();

		return view('admin.pages.stock-list', ['page' => 'stock'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
