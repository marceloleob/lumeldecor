<?php

namespace App\Http\Requests\Site;

use App\Filters\Nullable;
use App\Filters\NumberOnly;
use App\Http\Requests\BaseRequest;

class ZipCodeRequest extends BaseRequest
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
		'nullable'   => Nullable::class,
		'numberonly' => NumberOnly::class,
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'item'     => 'nullable',
        'zipcode'  => 'trim|escape|numberonly',
        'quantity' => 'cast:integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'item'     => 'integer',
        'zipcode'  => 'required|max:8',
        'quantity' => 'required|integer',
	];
}
