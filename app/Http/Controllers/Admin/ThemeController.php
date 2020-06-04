<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThemeRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
	/**
	 * @var ThemeRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ThemeRepository $repository
	 */
	public function __construct(ThemeRepository $repository)
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

		return view('admin.pages.theme-list', ['page' => 'theme'])->with($params);
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
		];

		return view('admin.pages.theme-form-create', ['page' => 'theme'])->with($params);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  ThemeRequest  $request
     * @return Response
     */
    public function store(ThemeRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('theme.list')->with('success', 'Tema cadastrado com sucesso!');
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
		];

		return view('admin.pages.theme-form-update', ['page' => 'theme'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  ThemeRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ThemeRequest $request, $id)
    {
		// save
		$response = $this->repository->store($request->all(), $id);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
		}

        return redirect()->route('material.list')->with('success', 'Tema atualizado com sucesso!');
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

        return redirect()->route('theme.list')->with($response);
    }
}
