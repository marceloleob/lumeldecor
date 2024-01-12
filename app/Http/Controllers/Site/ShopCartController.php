<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ShopCartService;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
	/**
	 * Shop Cart List
	 *
	 * @return Response
	 */
	public function show()
	{
		$params = ShopCartService::show();

		return view('site.pages.shopcart', ['current' => session('search')])->with($params);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function add(Request $request)
    {
		// save
		$params = ShopCartService::add($request->all());

		// verifica se salvou
		if ($params === false) {
			return back()->withInput()->with('danger', 'Erro no seu carrinho de compras, por favor tente novamente!');
		}

		return redirect()->route('shopcart.show')->with($params);
    }
}
