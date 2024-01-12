<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	/**
	 * @var UserRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param UserRepository $repository
	 */
	public function __construct(UserRepository $repository)
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
		$params = $this->repository->all('customer', $request->search);

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
		$entity = $this->repository->store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar cliente, tente novamente!');
		}

        return redirect()->route('customer.list')->with('success', 'Cliente cadastrado(a) com sucesso!');
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
		$entity = $this->repository->store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar cliente, tente novamente!');
		}

		return redirect()->route('customer.list')->with('success', 'Cliente atualizado(a) com sucesso!');
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
