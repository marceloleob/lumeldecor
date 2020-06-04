<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CampaignRequest;
use App\Repositories\CampaignRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
	/**
	 * @var CampaignRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param CampaignRepository $repository
	 */
	public function __construct(CampaignRepository $repository)
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

		return view('admin.pages.campaign-list', ['page' => 'campaign'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$params = [
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
		];

		return view('admin.pages.campaign-form-create', ['page' => 'campaign'])->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CampaignRequest  $request
     * @return Response
     */
    public function store(CampaignRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('campaign.list')->with('success', 'Campanha cadastrada com sucesso!');
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
			'optionsmaterial' => (new MaterialRepository())->options(),
			'optionscategory' => (new CategoryRepository())->options(),
		];

		return view('admin.pages.campaign-form-update', ['page' => 'campaign'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  CampaignRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CampaignRequest $request, $id)
    {
		// save
		$response = $this->repository->store($request->all(), $id);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
		}

        return redirect()->route('material.list')->with('success', 'Campanha atualizada com sucesso!');
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

        return redirect()->route('campaign.list')->with($response);
    }
}
