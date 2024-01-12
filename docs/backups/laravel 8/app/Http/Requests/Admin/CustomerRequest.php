<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Phone;
use App\Http\Requests\BaseRequest;

class CustomerRequest extends BaseRequest
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
		'phone' => Phone::class,
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'        => 'cast:integer',
        'user_id'   => 'cast:integer',
        'document'  => 'trim|escape',
        'telephone' => 'trim|phone|nullable',
        'cellphone' => 'trim|phone',
        'status'    => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
		'id'        => 'integer',
		'user_id'   => 'required|integer',
        'document'  => 'required|max:14|unique:customers',
        'telephone' => 'max:14|nullable',
        'cellphone' => 'required|max:14',
        'status'    => 'boolean',
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
			static::$validations['document'] .= ',document,' . $this->id;
		}

        return static::$validations;
    }
}
