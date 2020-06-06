<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StockRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\StockRepository;
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$params = [
			'data' => $this->repository->findById($id),
		];
// dd($params);
		return view('admin.pages.stock-form-update', ['page' => 'stock'])->with($params);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  StockRequest  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StockRequest $request, $id)
	{
		// save
		$response = $this->repository->store($request->all(), $id);
		// verifica se retornou erro
		if (isset($response['error'])) {
			return back()->withInput()->with($response);
		}

		return redirect()->route('material.list')->with('success', 'Categoria atualizada com sucesso!');
	}
}
