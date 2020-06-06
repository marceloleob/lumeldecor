<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
        'id'         => 'digit',
        'product_id' => 'digit',
        'item_id'    => 'digit',
        'reason_id'  => 'digit',
        'action'     => 'trim|escape|uppercase',
        'amount'     => 'cast:integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'         => 'required|integer',
        'product_id' => 'required|integer',
        'item_id'    => 'required|integer',
        'reason_id'  => 'required|integer',
        'action'     => 'required|string|required_with:I,O',
        'amount'     => 'required|integer',
	];
}
