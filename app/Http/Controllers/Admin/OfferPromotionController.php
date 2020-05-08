<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Services\CategoryService;
use App\Services\MaterialService;
use App\Services\OfferPromotionService;
use App\Services\ProductService;
use App\Services\ThemeService;
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
			'data'            => OfferPromotionService::find(),
			'optionsmaterial' => MaterialService::options(),
			'optionscategory' => CategoryService::options(),
			'optionstheme'    => ThemeService::options(),
			'optionsproduct'  => ProductService::options(),
			'optionskind'     => OfferPromotionService::options(),
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
