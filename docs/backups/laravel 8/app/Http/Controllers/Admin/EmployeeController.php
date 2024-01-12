<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
		$params = $this->repository->all('employee', $request->search);

		return view('admin.pages.employee-list', ['page' => 'employee'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('admin.pages.employee-form-create', ['page' => 'employee']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @return Response
     */
    public function store(EmployeeRequest $request)
    {
		// save
		$entity = $this->repository->store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar funcionário(a), tente novamente!');
		}

        return redirect()->route('employee.list')->with('success', 'Funcionário(a) cadastrado(a) com sucesso!');
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

		return view('admin.pages.employee-form-update', ['page' => 'employee'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EmployeeRequest $request, $id)
    {
		// save
		$entity = $this->repository->store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar funcionário(a), tente novamente!');
		}

        return redirect()->route('employee.list')->with('success', 'Funcionário(a) atualizado(a) com sucesso!');
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

        return redirect()->route('employee.list')->with($response);
    }
}
