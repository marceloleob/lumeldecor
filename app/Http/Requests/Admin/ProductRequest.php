<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
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
        'checkbox' => Checkbox::class,
    ];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
		'id'          => 'cast:integer',
        'material_id' => 'cast:integer',
        'category_id' => 'cast:integer',
        'name'        => 'trim|escape',
        'description' => 'trim|escape|strip_tags',
        'hashtag'     => 'trim|cast:string',
		'national'    => 'checkbox',
		'featured'    => 'checkbox',
		'status'      => 'checkbox',
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
        'name'        => 'required|min:2|max:150|unique:products',
        'description' => 'max:3000',
        'hashtag'     => '',
        'national'    => 'boolean',
        'featured'    => 'boolean',
        'status'      => 'boolean',
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
