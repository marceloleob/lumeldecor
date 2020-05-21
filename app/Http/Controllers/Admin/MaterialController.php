<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\MaterialRequest;
use App\Repositories\MaterialRepository;
use Illuminate\Http\Request;

class MaterialController extends AdminController
{
	/**
	 * @var MaterialRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param \App\Repositories\MaterialRepository $repository
	 */
	public function __construct(MaterialRepository $repository)
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

		return view('admin.pages.material-list')->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$params = [
			'data' => $this->repository->make(),
		];

		return view('admin.pages.material-form')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('material.list')->with($response);
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
		];

		return view('admin.pages.material-form')->with($params);
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

        return redirect()->route('material.list')->with($response);
    }
}
