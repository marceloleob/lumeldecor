<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Money;
use App\Filters\NumberFloat;
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
        'checkbox' => Checkbox::class,
        'money'    => Money::class,
		'float'    => NumberFloat::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        // product
		'id'                           => 'cast:integer',
		// product_info
        'material_id'                  => 'cast:integer',
        'category_id'                  => 'cast:integer',
        'name'                         => 'trim|escape',
        'description'                  => 'trim|escape|strip_tags',
        'hashtag'                      => 'trim|cast:string',
		'featured'                     => 'checkbox',
		// product
        'product.*.size'               => 'trim|escape|uppercase',
        'product.*.weight'             => 'float',
        'product.*.height'             => 'float',
        'product.*.width'              => 'float',
        'product.*.length'             => 'float',
        // item
        'product.*.item.*.color_id'    => 'cast:integer',
        'product.*.item.*.supplier_id' => 'cast:integer',
        'product.*.item.*.p_price'     => 'money',
        'product.*.item.*.s_price'     => 'money',
        'product.*.item.*.photo'       => 'trim|lowercase',
		'product.*.item.*.launch'      => 'checkbox',
		// theme item
		'product.*.item.*.theme'       => 'cast:string',
        // product info theme
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
		// product_info
        'material_id'                  => 'required|integer',
        'category_id'                  => 'required|integer',
        'name'                         => 'required|min:2|max:100',
        'description'                  => 'max:3000',
        'hashtag'                      => '',
        'featured'                     => 'boolean',
		// product
        'product.*.size'               => 'required|string|required_with:PP,P,M,G,GG,U',
        'product.*.weight'             => "required|regex:/^\d+(\.\d{1,3})?$/",
        'product.*.height'             => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.width'              => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.length'             => "required|regex:/^\d+(\.\d{1,2})?$/",
        // item
        'product.*.item.*.color_id'    => 'required|integer',
        'product.*.item.*.supplier_id' => 'required|integer',
        'product.*.item.*.p_price'     => "required|regex:/^\d+(\.\d{1,2})?$/",
        'product.*.item.*.s_price'     => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'product.*.item.*.photo'       => 'required|image|mimes:jpeg,png,jpg|max:3072', // 3 MEGABYTES
		'product.*.item.*.launch'      => 'boolean',
		// theme item
		'product.*.item.*.theme'       => 'integer',
        // product info theme
        'product.*.item.*.amount'      => 'required|integer',
    ];
}
