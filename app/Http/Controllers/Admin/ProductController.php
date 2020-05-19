<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\ColorService;
use App\Services\ItemService;
use App\Services\ProductService;
use App\Services\SupplierService;
use App\Services\ThemeService;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = ProductService::list($request->search);

		return view('admin.pages.product-list')->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $item
     * @return \Illuminate\Http\Response
     */
    public function create($item = null)
    {
        // caso nao tenha informado o item
        if (empty($item)) {
            //retorna para o formulario do item
            return back()->withInput()->with(['danger' => 'Para acessar o formulário de produto (2ª parte) você precisa ter concluído a 1ª parte.']);
        }

		$params = [
			'data'            => ProductService::find(),
			'item'            => ItemService::find($item),
			'optionssupplier' => SupplierService::options(),
            'optionscolor'    => ColorService::options(),
            'optionstheme'    => ThemeService::options(),
		];

		return view('admin.pages.product-form')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // save
        $response = ProductService::store($request);

        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product.form')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

	// /**
    //  * Toggle the status storage.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function toggle($id)
    // {
    //     $response = ProductService::toggleStatus($id);

    //     return redirect()->route('product.list')->with($response);
    // }
}
