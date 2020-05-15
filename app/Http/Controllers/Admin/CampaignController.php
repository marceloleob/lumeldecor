<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\MaterialService;
use App\Services\ThemeService;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = ThemeService::list($request->search);

		return view('admin.pages.campaign-list')->with($params);
	}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			$params = [
                'data'            => ThemeService::find(),
                'optionsmaterial' => MaterialService::options(),
                'optionscategory' => CategoryService::options(),
			];

			return view('admin.pages.campaign-form')->with($params);
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
			return redirect()->route('theme.list');
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
				$response = ThemeService::toggleStatus($id);

				return redirect()->route('theme.list')->with($response);
		}
}
