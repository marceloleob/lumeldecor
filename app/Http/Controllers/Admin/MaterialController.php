<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MaterialRequest;
use App\Repositories\MaterialRepository;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
	/**
	 * @var MaterialRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param MaterialRepository $repository
	 */
	public function __construct(MaterialRepository $repository)
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

		return view('admin.pages.material-list', ['page' => 'material'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('admin.pages.material-form-create', ['page' => 'material']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MaterialRequest  $request
     * @return Response
     */
    public function store(MaterialRequest $request)
    {
		// save
		$entity = MaterialService::store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar o material, tente novamente!');
		}

        return redirect()->route('material.list')->with('success', 'Material cadastrado com sucesso!');
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

		return view('admin.pages.material-form-update', ['page' => 'material'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  MaterialRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MaterialRequest $request, $id)
    {
		// save
		$entity = MaterialService::store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar o material, tente novamente!');
		}

		return redirect()->route('material.list')->with('success', 'Material atualizado com sucesso!');
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
