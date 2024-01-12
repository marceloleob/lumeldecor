<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ShippingAllRequest;
use App\Http\Requests\Site\ShippingOneRequest;
use App\Services\ShippingService;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
	/**
	 * Return calc of Correios just 1 item
	 *
	 * @param ShippingOneRequest $request
	 * @return array
	 */
	public function calcOne(ShippingOneRequest $request)
	{
		$this->setSession('zipcode', $request->zipcode);

		return ShippingService::handle($request->all());
	}

	/**
	 * Return calc of Correios all items
	 *
	 * @param ShippingAllRequest $request
	 * @return array
	 */
	public function calcAll(ShippingAllRequest $request)
	{
		$this->setSession('zipcode', $request->zipcode);

		return ShippingService::handle($request->all());
	}
}

