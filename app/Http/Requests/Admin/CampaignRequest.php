<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Http\Requests\BaseRequest;

class CampaignRequest extends BaseRequest
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
        'id'           => 'digit',
        'name'         => 'trim|escape',
        'start_day'    => 'digit',
        'start_month'  => 'digit',
        'finish_day'   => 'digit',
        'finish_month' => 'digit',
        'status'       => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'           => 'integer',
        'name'         => 'required|min:2|max:150|unique:campaigns',
        'start_day'    => 'required|integer',
        'start_month'  => 'required|integer',
        'finish_day'   => 'required|integer',
        'finish_month' => 'required|integer',
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
			static::$validations['name'] .= ',name,' . $this->id;
		}

        return static::$validations;
    }
}
