<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Money;
use App\Filters\Nullable;
use App\Filters\NumberFloat;
use App\Http\Requests\BaseRequest;

class ProductCreateRequest extends BaseRequest
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
		'float'    => NumberFloat::class,
		'nullable' => Nullable::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        // product
		'id'                           => 'cast:integer',
        'material_id'                  => 'cast:integer',
        'category_id'                  => 'cast:integer',
        'name'                         => 'trim|escape',
        'description'                  => 'trim|escape|strip_tags',
        'hashtag'                      => 'trim|cast:string',
		'featured'                     => 'checkbox',
		// product size
        'product.*.size'               => 'trim|escape|uppercase',
        'product.*.weight'             => 'float',
        'product.*.shape'              => 'trim|escape|uppercase',
        'product.*.pro_length'         => 'float',
        'product.*.pro_width'          => 'float|nullable',
        'product.*.pro_height'         => 'float',
        'product.*.shi_length'         => 'float',
        'product.*.shi_width'          => 'float|nullable',
        'product.*.shi_height'         => 'float',
        // item
        'product.*.item.*.supplier_id' => 'cast:integer',
        'product.*.item.*.p_price'     => 'money',
        'product.*.item.*.s_price'     => 'money',
        'product.*.item.*.picture'     => 'trim|lowercase',
		'product.*.item.*.launch'      => 'checkbox',
		// item color
		'product.*.item.*.colors'      => 'cast:collection',
		// item theme
		'product.*.item.*.themes'      => 'cast:collection',
        // stock
        'product.*.item.*.amount'      => 'cast:integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        // product
		'id'                           => 'integer',
        'material_id'                  => 'required|integer',
        'category_id'                  => 'required|integer',
        'name'                         => 'required|min:2|max:100',
        'description'                  => 'max:3000',
        'hashtag'                      => '',
        'featured'                     => 'boolean',
		// product size
        'product.*.size'               => 'required|string|required_with:PP,P,M,G,GG,U',
        'product.*.weight'             => "required|regex:/^\d+(\.\d{1,3})?$/",
        'product.*.shape'              => 'required|string|required_with:Q,R',
        'product.*.pro_length'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.pro_width'          => "nullable|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.pro_height'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.shi_length'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.shi_width'          => "nullable|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.shi_height'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        // item
        'product.*.item.*.supplier_id' => 'required|integer',
        'product.*.item.*.p_price'     => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.item.*.s_price'     => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'product.*.item.*.picture'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3 MEGABYTES
		'product.*.item.*.launch'      => 'boolean',
		// item color
		'product.*.item.*.colors'      => 'required',
		// item theme
		'product.*.item.*.themes'      => '',
        // stock
        'product.*.item.*.amount'      => 'required|integer',
    ];
}
