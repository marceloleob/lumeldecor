<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	/**
	 * @var EmployeeRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param EmployeeRepository $repository
	 */
	public function __construct(EmployeeRepository $repository)
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

		return view('admin.pages.employee-list', ['page' => 'employee'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.pages.employee-form-create', ['page' => 'employee']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('employee.list')->with($response);
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

		return view('admin.pages.employee-form-update', ['page' => 'employee'])->with($params);
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