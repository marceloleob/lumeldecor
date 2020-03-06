<?php

namespace App\Http\Controllers\Ajax;

use App\Services\ToggleService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ToggleRequest;
use Illuminate\Http\Request;

class ToggleController extends Controller
{
	/**
	 * Return all property types
	 *
	 * @param ToggleRequest $request
	 * @return array
	 */
	public function status(Request $request)
	{
		$return = ToggleService::status($request['code'], $request['model']);

		return response()->json($return);
	}
}
