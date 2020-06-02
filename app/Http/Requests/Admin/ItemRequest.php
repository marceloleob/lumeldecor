<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Money;
use App\Http\Requests\BaseRequest;

class ItemRequest extends BaseRequest
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
		'money'    => Money::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'              => 'digit',
        'product_id'      => 'digit',
        'product_size_id' => 'digit',
        // item
        'supplier_id'     => 'cast:integer',
        'p_price'         => 'money',
        's_price'         => 'money',
        'picture'         => 'trim|lowercase',
        'new_picture'     => 'trim|lowercase',
		'launch'          => 'checkbox',
		'status'          => 'checkbox',
		// item color
		'colors'          => 'cast:collection',
		// item theme
		'themes'          => 'cast:collection',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'              => 'integer',
        'product_id'      => 'integer',
        'product_size_id' => 'integer',
        // item
        'supplier_id'     => 'required|integer',
        'p_price'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        's_price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'picture'         => 'required',
        'new_picture'     => 'required_if:picture,false|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3 MEGABYTES
        // 'new_picture'     => 'required_if:picture,false|file|max:3072', // 3 MEGABYTES
		'launch'          => 'boolean',
		'status'          => 'boolean',
		// item color
		'colors'          => 'required',
		// item theme
		'themes'          => '',
    ];
}
