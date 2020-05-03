<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
	/**
	 * Show the application dashboard.
	 *
	 * @return void
	 */
	public function index()
	{
		return view('admin.pages.dashboard');
	}
}
