<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Http\Requests\BaseRequest;

class UserRequest extends BaseRequest
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
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'           => 'cast:integer',
        'user_rule_id' => 'cast:integer',
        'name'         => 'trim|escape',
        'email'        => 'trim|escape|lowercase',
        'password'     => 'trim',
        'status'       => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
		'id'           => 'integer',
		'user_rule_id' => 'required|integer',
        'name'         => 'required|string|min:2|max:100',
        'email'        => 'required|string|min:3|max:100|email|unique:users',
        'password'     => 'required|string|min:6|confirmed',
        'status'       => 'boolean',
	];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		// efetua o tratamento para campo unico
		if (!empty($this->id)) {
			static::$validations['email'] .= ',email,' . $this->id;
		}

        return static::$validations;
    }
}
