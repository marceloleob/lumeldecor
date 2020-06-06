<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ToneRequest extends FormRequest
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
        'name'   => 'required|min:2|max:100|unique:tones',
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
			static::$validations['name'] .= ',name,' . $this->id;
		}

        return static::$validations;
    }
}
