<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Repositories\ColorRepository;
use Illuminate\Http\Request;

class ColorController extends Controller
{
	/**
	 * @var ColorRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ColorRepository $repository
	 */
	public function __construct(ColorRepository $repository)
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

		return view('admin.pages.color-list', ['page' => 'color'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.pages.color-form-create', ['page' => 'color']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('color.list')->with($response);
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

		return view('admin.pages.color-form-update', ['page' => 'color'])->with($params);
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

        return redirect()->route('color.list')->with($response);
    }
}
