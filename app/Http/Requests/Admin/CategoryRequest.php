<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
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
		'checkbox' => Checkbox::class
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'          => 'digit',
        'material_id' => 'digit',
        'name'        => 'trim|escape',
        'status'      => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'          => 'integer',
        'material_id' => 'required|integer',
        'name'        => 'required|min:2|max:100',
        'status'      => 'boolean',
	];
}
