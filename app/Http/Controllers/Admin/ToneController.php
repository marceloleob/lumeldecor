<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ToneRequest;
use App\Repositories\ColorRepository;
use App\Repositories\ToneRepository;
use Illuminate\Http\Request;

class ToneController extends Controller
{
	/**
	 * @var ToneRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ToneRepository $repository
	 */
	public function __construct(ToneRepository $repository)
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
		$params = $this->repository->all($request->search, $request->color_id);
		$params['optionscolor'] = (new ColorRepository())->options();

		return view('admin.pages.tone-list', ['page' => 'tone'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$params = [
			'optionscolor' => (new ColorRepository())->options(),
		];

		return view('admin.pages.tone-form-create', ['page' => 'tone'])->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ToneRequest  $request
     * @return Response
     */
    public function store(ToneRequest $request)
    {
		// save
		$entity = $this->repository->store($request->all());
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao cadastrar tonalidade, tente novamente!');
		}

        return redirect()->route('tone.list')->with('success', 'Tonalidade cadastrada com sucesso!');
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

		return view('admin.pages.tone-form-update', ['page' => 'tone'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  ToneRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ToneRequest $request, $id)
    {
		// save
		$entity = $this->repository->store($request->all(), $id);
		// verifica se salvou
		if (! isset($entity->id)) {
			return back()->withInput()->with('danger', 'Erro ao atualizar tonalidade, tente novamente!');
		}

        return redirect()->route('tone.list')->with('success', 'Tonalidade atualizada com sucesso!');
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

        return redirect()->route('tone.list')->with($response);
    }
}
