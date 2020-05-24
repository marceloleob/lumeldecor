<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Nullable;
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
        'nullable' => Nullable::class,
        'checkbox' => Checkbox::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'          => 'digit',
        'material_id' => 'digit',
        'category_id' => 'digit',
        'name'        => 'trim|escape',
        'description' => 'trim|escape|strip_tags|nullable',
        'hashtag'     => 'trim|escape|nullable',
        'featured'    => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'          => 'integer',
        'material_id' => 'required|integer',
        'category_id' => 'required|integer',
        'name'        => 'required|min:2|max:100',
        'description' => 'max:3000|nullable',
        'hashtag'     => 'nullable',
        'featured'    => 'boolean',
    ];
}
