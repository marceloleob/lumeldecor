<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferCouponRequest;
use App\Repositories\OfferCouponRepository;
use Illuminate\Http\Request;

class OfferCouponController extends Controller
{
	/**
	 * @var OfferCouponRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param OfferCouponRepository $repository
	 */
	public function __construct(OfferCouponRepository $repository)
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

		return view('admin.pages.offer-coupon-list', ['page' => 'coupon'])->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('admin.pages.offer-coupon-form-create', ['page' => 'coupon']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OfferCouponRequest  $request
     * @return Response
     */
    public function store(OfferCouponRequest $request)
    {
		// save
		$response = $this->repository->store($request->all());
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('coupon.list')->with('success', 'Cupom cadastrado com sucesso!');
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

		return view('admin.pages.offer-coupon-form-update', ['page' => 'coupon'])->with($params);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  OfferCouponRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(OfferCouponRequest $request, $id)
    {
		// save
		$response = $this->repository->store($request->all(), $id);
        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
		}

        return redirect()->route('material.list')->with('success', 'Cupom atualizado com sucesso!');
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

        return redirect()->route('coupon.list')->with($response);
    }
}
