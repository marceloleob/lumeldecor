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
		'id'                         => 'cast:integer',
        'material_id'                => 'cast:integer',
        'category_id'                => 'cast:integer',
        'name'                       => 'trim|escape',
        'description'                => 'trim|escape|strip_tags',
        'hashtag'                    => 'trim|cast:string',
		'featured'                   => 'checkbox',
		'launch'                     => 'checkbox',
		// product size
        'sizes.*.size'               => 'trim|escape|uppercase',
        'sizes.*.weight'             => 'float',
        'sizes.*.shape'              => 'trim|escape|uppercase',
        'sizes.*.pro_length'         => 'float',
        'sizes.*.pro_width'          => 'float|nullable',
        'sizes.*.pro_height'         => 'float',
        'sizes.*.shi_length'         => 'float',
        'sizes.*.shi_width'          => 'float|nullable',
        'sizes.*.shi_height'         => 'float',
        // item
        'sizes.*.item.*.supplier_id' => 'cast:integer',
        'sizes.*.item.*.p_price'     => 'money',
        'sizes.*.item.*.s_price'     => 'money',
        'sizes.*.item.*.picture'     => 'trim|lowercase',
		'sizes.*.item.*.launch'      => 'checkbox',
		// item color
		'sizes.*.item.*.colors'      => 'cast:collection',
		// item theme
		'sizes.*.item.*.themes'      => 'cast:collection',
        // stock
        'sizes.*.item.*.amount'      => 'cast:integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        // product
		'id'                         => 'integer',
        'material_id'                => 'required|integer',
        'category_id'                => 'required|integer',
        'name'                       => 'required|min:2|max:100',
        'description'                => 'max:3000',
        'hashtag'                    => '',
        'featured'                   => 'boolean',
        'launch'                     => 'boolean',
		// product size
        'sizes.*.size'               => 'required|string|required_with:PP,P,M,G,GG,U',
        'sizes.*.weight'             => "required|regex:/^\d+(\.\d{1,3})?$/",
        'sizes.*.shape'              => 'required|string|required_with:Q,R',
        'sizes.*.pro_length'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'sizes.*.pro_width'          => "nullable|regex:/^\d+(\.\d{1,2})?$/",
        'sizes.*.pro_height'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'sizes.*.shi_length'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        'sizes.*.shi_width'          => "nullable|regex:/^\d+(\.\d{1,2})?$/",
        'sizes.*.shi_height'         => "required|regex:/^\d+(\.\d{1,2})?$/",
        // item
        'sizes.*.item.*.supplier_id' => 'required|integer',
        'sizes.*.item.*.p_price'     => "required|regex:/^\d+(\.\d{1,2})?$/",
        'sizes.*.item.*.s_price'     => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'sizes.*.item.*.picture'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3 MEGABYTES
		'sizes.*.item.*.launch'      => 'boolean',
		// item color
		'sizes.*.item.*.colors'      => 'required',
		// item theme
		'sizes.*.item.*.themes'      => '',
        // stock
        'sizes.*.item.*.amount'      => 'required|integer',
    ];
}
