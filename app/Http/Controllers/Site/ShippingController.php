<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ZipCodeRequest;
use App\Services\ShippingService;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
	/**
	 * Return calc of Correios
	 *
	 * @param ZipCodeRequest $request
	 * @return array
	 */
	public function calculator(ZipCodeRequest $request)
	{
		$this->setSession('zipcode', $request->zipcode);
return $request->zipcode;
		return ShippingService::handle($request->all());
	}
}
