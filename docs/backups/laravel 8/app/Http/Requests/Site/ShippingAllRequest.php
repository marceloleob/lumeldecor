<?php

namespace App\Http\Requests\Site;

use App\Filters\NumberOnly;
use App\Http\Requests\BaseRequest;

class ShippingAllRequest extends BaseRequest
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
    public static $customFilters = [
		'numberonly' => NumberOnly::class,
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'item.*'     => 'cast:integer',
        'quantity.*' => 'cast:integer',
        'zipcode'    => 'trim|escape|numberonly',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'item.*'     => 'required|integer',
        'quantity.*' => 'required|integer',
        'zipcode'    => 'required|max:8',
	];
}
