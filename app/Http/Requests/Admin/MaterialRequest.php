<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class MaterialRequest extends BaseRequest
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
    public static $customFilters = [];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'     => 'digit',
        'name'   => 'trim|escape',
        'status' => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'     => 'integer',
        'name'   => 'required|unique:materials|min:2|max:100',
        'status' => 'boolean',
    ];
}
