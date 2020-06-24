<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupplierRequest;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
	/**
	 * @var SupplierRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param SupplierRepository $repository
	 */
	public function __construct(SupplierRepository $repository)
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

		return view('admin.pages.supplier-list', ['page' => 'supplier'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('admin.pages.supplier-form-create', ['page' => 'supplier']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SupplierRequest  $request
     * @return Response
     */
    public function store(SupplierRequest $request)
    {
		// save
		$entity = $this->repository->store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar fornecedor, tente novamente!');
		}

        return redirect()->route('supplier.list')->with('success', 'Fornecedor cadastrado com sucesso!');
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

		return view('admin.pages.supplier-form-update', ['page' => 'supplier'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  SupplierRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SupplierRequest $request, $id)
    {
		// save
		$entity = $this->repository->store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar fornecedor, tente novamente!');
		}

        return redirect()->route('supplier.list')->with('success', 'Fornecedor atualizado com sucesso!');
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

        return redirect()->route('supplier.list')->with($response);
    }
}
