<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Services\OfferPromotionService;
use Illuminate\Http\Request;

class OfferPromotionController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = OfferPromotionService::list($request->search);

		return view('admin.pages.offer-promotion-list')->with($params);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$params = [
			'data' => OfferPromotionService::find(),
		];

		return view('admin.pages.offer-promotion-form')->with($params);
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
		return redirect()->route('promotion.list');
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
        $response = OfferPromotionService::toggleStatus($id);

        return redirect()->route('promotion.list')->with($response);
    }
}
