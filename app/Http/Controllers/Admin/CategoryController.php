<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
	 * @var CategoryRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param CategoryRepository $repository
	 */
	public function __construct(CategoryRepository $repository)
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
		$params['optionsmaterial'] = (new MaterialRepository())->options();

		return view('admin.pages.category-list', ['page' => 'category'])->with($params);
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
		];

		return view('admin.pages.category-form-create', ['page' => 'category'])->with($params);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CategoryRequest  $request
	 * @return Response
	 */
    public function store(CategoryRequest $request)
    {
		// save
		$entity = CategoryService::store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar a categoria, tente novamente!');
		}

        return redirect()->route('category.list')->with('success', 'Categoria cadastrada com sucesso!');
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
		];

		return view('admin.pages.category-form-update', ['page' => 'category'])->with($params);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  CategoryRequest  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CategoryRequest $request, $id)
    {
		// save
		$entity = CategoryService::store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar a categoria, tente novamente!');
		}

		return redirect()->route('category.list')->with('success', 'Categoria atualizada com sucesso!');
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

		return redirect()->route('category.list')->with($response);
	}

	/**
	 * Return select options of Category
	 *
	 * @param Request $request
	 * @return string
	 */
	public function options(Request $request)
	{
		return $this->repository->options($request);
	}
}
