<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContactMessageService;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = ContactMessageService::list($request->search);

		return view('admin.pages.contact-message-list')->with($params);
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
