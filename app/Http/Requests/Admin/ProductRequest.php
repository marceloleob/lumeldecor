<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Decimal;
use App\Filters\Money;
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
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        // product
        'id'          => 'digit|cast:integer',
        'item_id'     => 'digit|cast:integer',
        'supplier_id' => 'digit|cast:integer',
        'size'        => 'trim|escape|uppercase',
        'weight'      => 'decimal',
        'height'      => 'decimal',
        'width'       => 'decimal',
        'length'      => 'decimal',
        'p_price'     => 'money',
        's_price'     => 'money',
        // product info
        'color_id'    => 'digit',
        'amount'      => 'digit',
        'image'       => 'trim,lowercase',
        'launch'      => 'checkbox|cast:boolean',
        // product info theme
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        // product
        'id'          => 'integer',
        'item_id'     => 'required|integer',
        'supplier_id' => 'required|integer',
        'size'        => 'required|string|required_with:P,M,G,U',
        'weight'      => "required|regex:/^\d+(\.\d{1,2})?$/",
        'height'      => "required|regex:/^\d+(\.\d{1,2})?$/",
        'width'       => "required|regex:/^\d+(\.\d{1,2})?$/",
        'length'      => "required|regex:/^\d+(\.\d{1,2})?$/",
        'p_price'     => "required|regex:/^\d+(\.\d{1,2})?$/",
        's_price'     => 'required',
        // product info
        'color_id'    => 'required',
        'amount'      => 'required',
        'image'       => 'required|image|mimes:jpeg,png,jpg|max:3000', // 3 MEGABYTES
        'launch'      => 'boolean',
        // product info theme
    ];
}
