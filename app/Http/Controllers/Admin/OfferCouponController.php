<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Services\OfferCouponService;
use Illuminate\Http\Request;

class OfferCouponController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = OfferCouponService::list($request->search);

		return view('admin.pages.offer-coupon-list')->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$params = [
			'data' => OfferCouponService::find(),
		];

		return view('admin.pages.offer-coupon-form')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// redirect to list
		return redirect()->route('coupon.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Toggle the status storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function toggle($id)
    {
        $response = OfferCouponService::toggleStatus($id);

        return redirect()->route('coupon.list')->with($response);
    }
}
