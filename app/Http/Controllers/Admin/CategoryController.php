<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Services\MaterialService;
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
	 * @param \App\Repositories\CategoryRepository $repository
	 */
	public function __construct(CategoryRepository $repository)
	{
		$this->repository = $repository;
	}

	// public function teste()
	// {
	// 	$teste = $this->repository->all();

	// 	return $teste;
	// }

	// public function testeFind($categoryId)
	// {
	// 	$teste = $this->repository->findById($categoryId);

	// 	return $teste;
	// }

	// public function testeUpdate($categoryId, Request $request)
	// {
	// 	$teste = $this->repository->update($categoryId, $request);

	// 	return redirect('/teste/find/' . $categoryId);
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function index(Request $request)
    {
		// $params = CategoryService::list($request->search);
		$params = $this->repository->all();

        return view('admin.pages.category-list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$params = [
			'data'            => CategoryService::find(),
			'optionsmaterial' => MaterialService::options(),
		];

		return view('admin.pages.category-form')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// redirect to list
		return redirect()->route('category.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Toggle the status storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function toggle($id)
    {
        $response = CategoryService::toggleStatus($id);

        return redirect()->route('category.list')->with($response);
	}

	/**
	 * Return select options of Category
	 *
	 * @param Request $request
	 * @return array
	 */
	public function options(Request $request)
	{
		// verifica se foi informado o POST com o "material"
		$material = $request->material;

		return CategoryService::options($material);
	}
}
