<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Repositories\ColorRepository;
use App\Repositories\ToneRepository;
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
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$params = $this->repository->all($request->search, $request->tone_id);
		$params['optionstone'] = (new ToneRepository())->options();

		return view('admin.pages.color-list', ['page' => 'color'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('admin.pages.color-form-create', ['page' => 'color']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ColorRequest  $request
     * @return Response
     */
    public function store(ColorRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('color.list')->with('success', 'Cor cadastrada com sucesso!');
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

		return view('admin.pages.color-form-update', ['page' => 'color'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  ColorRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ColorRequest $request, $id)
    {
		// save
		$response = $this->repository->store($request->all(), $id);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
		}

        return redirect()->route('material.list')->with('success', 'Cor atualizada com sucesso!');
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
