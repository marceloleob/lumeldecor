<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Services\CategoryService;
use App\Services\ItemService;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$params = ItemService::list($request->search);

		return view('admin.pages.item-list')->with($params);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$params = [
			'data'            => ItemService::find(),
			'optionsmaterial' => MaterialService::options(),
            'optionscategory' => CategoryService::options(),
		];

		return view('admin.pages.item-form')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        // save
        $response = ItemService::store($request);

        // verifica se retornou erro
        if (isset($response['error'])) {
            return back()->withInput()->with($response);
        }

        return redirect()->route('product.form', $response['id'])->with($response);
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

	/**
     * Toggle the status storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function toggle($id)
    {
        $response = ItemService::toggleStatus($id);

        return redirect()->route('item.list')->with($response);
    }
}
