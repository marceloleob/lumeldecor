<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Http\Requests\BaseRequest;

class ToneRequest extends BaseRequest
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
        'id'     => 'cast:integer',
        'name'   => 'trim|escape',
        'hexa'   => 'trim',
        'status' => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'     => 'integer',
        'name'   => 'required|min:2|max:100',
        'hexa'   => 'required|max:7|unique:tones',
        'status' => 'boolean',
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
			static::$validations['hexa'] .= ',hexa,' . $this->id;
		}

        return static::$validations;
    }
}
