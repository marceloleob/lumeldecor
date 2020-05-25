<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Decimal;
use App\Filters\Money;
use App\Filters\Nullable;
use App\Http\Requests\BaseRequest;

class ProductRequest extends BaseRequest
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
        'money'    => Money::class,
        'checkbox' => Checkbox::class,
		'decimal'  => Decimal::class,
		'nullable' => Nullable::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        // product
		'id'            => 'digit|cast:integer',
		// product_info
        'material_id'   => 'digit',
        'category_id'   => 'digit',
        'name'          => 'trim|escape',
        'description'   => 'trim|escape|strip_tags',
        'hashtag'       => 'trim|escape|nullable',
		'featured'      => 'checkbox|cast:boolean',
		'status'        => 'checkbox|cast:boolean',
		// product_supplier
		'supplier_id'   => 'digit',
        'p_price'       => 'money',
		// product
        'size'          => 'trim|escape|uppercase',
        'weight'        => 'decimal', // precision = 3
        'height'        => 'decimal',
        'width'         => 'decimal',
        'length'        => 'decimal',
        's_price'       => 'money',
        // item
        'item.*.color'  => 'digit',
        'item.*.photo'  => 'trim|lowercase',
        'item.*.launch' => 'checkbox|cast:boolean',
        // stock
        'item.*.amount' => 'digit',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        // product
		'id'            => 'integer',
		// product_info
        'material_id'   => 'required|integer',
        'category_id'   => 'required|integer',
        'name'          => 'required|min:2|max:100',
        'description'   => 'max:3000',
        'hashtag'       => 'max:3000|nullable',
        'featured'      => 'boolean',
		'status'        => 'boolean',
		// product_supplier
        'supplier_id'   => 'required|integer',
        'p_price'       => "required|regex:/^\d+(\.\d{1,2})?$/",
		// product
        'size'          => 'required|string|required_with:P,M,G,U',
        'weight'        => "required|regex:/^\d+(\.\d{1,3})?$/",
        'height'        => "required|regex:/^\d+(\.\d{1,2})?$/",
        'width'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'length'        => "required|regex:/^\d+(\.\d{1,2})?$/",
        's_price'       => 'required|regex:/^\d+(\.\d{1,2})?$/',
        // item
        'item.*.color'  => 'required|integer',
        'item.*.photo'  => 'required|image|mimes:jpeg,png,jpg|max:3000', // 3 MEGABYTES
		'item.*.launch' => 'boolean',
		// theme item
		'item.*.theme'  => 'integer',
        // product info theme
        'item.*.amount' => 'required|integer',
    ];
}
