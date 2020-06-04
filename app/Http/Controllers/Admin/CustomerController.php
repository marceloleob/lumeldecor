<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	/**
	 * @var CustomerRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param CustomerRepository $repository
	 */
	public function __construct(CustomerRepository $repository)
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

		return view('admin.pages.customer-list', ['page' => 'customer'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('admin.pages.customer-form-create', ['page' => 'customer']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerRequest  $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('customer.list')->with('success', 'Cliente cadastrado com sucesso!');
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

		return view('admin.pages.customer-form-update', ['page' => 'customer'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CustomerRequest $request, $id)
    {
		// save
		$response = $this->repository->store($request->all(), $id);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
		}

        return redirect()->route('material.list')->with('success', 'Cliente atualizado com sucesso!');
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

        return redirect()->route('customer.list')->with($response);
    }
}
