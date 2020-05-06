<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Services\ReceivedEmailService;
use Illuminate\Http\Request;

class ReceivedEmailController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = ReceivedEmailService::list($request->search);

		return view('admin.pages.received-email-list')->with($params);
	}

    /**
     * Show the contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
		//
    }

}
