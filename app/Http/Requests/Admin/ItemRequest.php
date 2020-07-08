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
        'id'              => 'cast:integer',
        'product_id'      => 'cast:integer',
        'product_size_id' => 'cast:integer',
        // item
        'supplier_id'     => 'cast:integer',
        'p_price'         => 'money',
        's_price'         => 'money',
        'amount'          => 'cast:integer',
		'launch'          => 'checkbox',
		'status'          => 'checkbox',
		// item tone
		'tones'           => 'cast:collection',
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
        'amount'          => 'integer',
        'pictures.1'      => 'required_if:old_pictures.1.name,false|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        'pictures.2'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        'pictures.3'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
		'launch'          => 'boolean',
		'status'          => 'boolean',
		// item tone
		'tones'           => 'required',
		// item theme
		'themes'          => '',
    ];
}
