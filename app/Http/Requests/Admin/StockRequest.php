<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class StockRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @var boolean
     */
    public $authorize = true;

    /**
     * Custom filter rules
     *
     * @var array
     */
    public static $customFilters = [];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'stock_id'   => 'cast:integer',
        'product_id' => 'cast:integer',
        'item_id'    => 'cast:integer',
        'reason_id'  => 'cast:integer',
        'action'     => 'trim|escape|uppercase',
        'amount'     => 'cast:integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'stock_id'   => 'required|integer',
        'product_id' => 'required|integer',
        'item_id'    => 'required|integer',
        'reason_id'  => 'required|integer',
        'action'     => 'required|string|required_with:I,O',
        'amount'     => 'required|integer',
	];
}
