<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use Illuminate\Http\Request;

class CategoryController extends AdminController
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
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function index(Request $request)
    {
		$params = $this->repository->all($request->search);

		return view('admin.pages.category-list', ['page' => 'category'])->with($params);
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
		];

		return view('admin.pages.category-form-create', ['page' => 'category'])->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('category.list')->with($response);
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
		];

		return view('admin.pages.category-form-update', ['page' => 'category'])->with($params);
    }

    /**
     * Toggle the status storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $response = $this->repository->changeStatus($id);

        return redirect()->route('category.list')->with($response);
    }

	/**
	 * Return select options of Category
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function options(Request $request)
	{
		return $this->repository->options($request);
	}
}
