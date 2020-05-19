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
        'id'          => 'digit|cast:integer',
        'item_id'     => 'digit|cast:integer',
        'supplier_id' => 'digit|cast:integer',
        'size'        => 'decimal',
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
        'size'        => 'required',
        'weight'      => 'required',
        'height'      => 'required',
        'width'       => 'required',
        'length'      => 'required',
        'p_price'     => 'required',
        's_price'     => 'required',
        // product info
        'color_id'    => 'required',
        'amount'      => 'required',
        'image'       => 'required|image|mimes:jpeg,png,jpg|max:3000', // 3 MEGABYTES
        'launch'      => 'boolean',
        // product info theme
    ];
}
