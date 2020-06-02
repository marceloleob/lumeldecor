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
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = $this->repository->all($request->search);

		return view('admin.pages.supplier-list', ['page' => 'supplier'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.pages.supplier-form-create', ['page' => 'supplier']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('supplier.list')->with($response);
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

		return view('admin.pages.supplier-form-update', ['page' => 'supplier'])->with($params);
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
