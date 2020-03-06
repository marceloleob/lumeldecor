<?php

namespace App\Http\Requests\Site;

use App\Http\Requests\BaseRequest;

class ToggleRequest extends BaseRequest
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
        'code'  => 'digit',
        'model' => 'trim|lowercase',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'code'  => 'required',
        'model' => 'required',
    ];
}
