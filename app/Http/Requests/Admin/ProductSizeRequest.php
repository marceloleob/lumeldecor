<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Nullable;
use App\Filters\NumberFloat;
use App\Http\Requests\BaseRequest;

class ProductSizeRequest extends BaseRequest
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
        'checkbox' => Checkbox::class,
		'float'    => NumberFloat::class,
		'nullable' => Nullable::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        // product size
		'id'         => 'cast:integer',
		'product_id' => 'cast:integer',
        'size'       => 'trim|escape|uppercase',
        'weight'     => 'float',
        'shape'      => 'trim|escape|uppercase',
        'pro_length' => 'float',
        'pro_width'  => 'float|nullable',
        'pro_height' => 'float',
        'shi_length' => 'float',
        'shi_width'  => 'float|nullable',
        'shi_height' => 'float',
		'status'     => 'checkbox',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        // product size
		'id'         => 'integer',
		'product_id' => 'required|integer',
        'size'       => 'required|string|required_with:PP,P,M,G,GG,U',
        'weight'     => "required|regex:/^\d+(\.\d{1,3})?$/",
        'shape'      => 'required|string|required_with:Q,R',
        'pro_length' => "required|regex:/^\d+(\.\d{1,2})?$/",
        'pro_width'  => "nullable|regex:/^\d+(\.\d{1,2})?$/",
        'pro_height' => "required|regex:/^\d+(\.\d{1,2})?$/",
        'shi_length' => "required|regex:/^\d+(\.\d{1,2})?$/",
        'shi_width'  => "nullable|regex:/^\d+(\.\d{1,2})?$/",
		'shi_height' => "required|regex:/^\d+(\.\d{1,2})?$/",
		'status'     => 'boolean',
    ];
}
