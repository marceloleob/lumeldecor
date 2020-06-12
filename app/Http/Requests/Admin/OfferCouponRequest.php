<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Money;
use App\Http\Requests\BaseRequest;

class OfferCouponRequest extends BaseRequest
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
		'money' => Money::class,
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'          => 'cast:integer',
        'name'        => 'trim|escape',
        'code'        => 'trim|escape|uppercase',
        'kind'        => 'trim|escape|uppercase',
        'amount'      => 'money',
        'start_date'  => 'trim|format_date:d/m/Y,Y-m-d',
        'finish_date' => 'trim|format_date:d/m/Y,Y-m-d',
        'status'      => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'          => 'integer',
        'name'        => 'required|min:2|max:100',
        'code'        => 'required|min:5|max:50|unique:offer_coupons',
		'kind'        => 'required|string|required_with:V,P',
		'amount'      => "required|regex:/^\d+(\.\d{1,2})?$/",
        'start_date'  => 'required|date',
        'finish_date' => 'required|date',
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
			static::$validations['code'] .= ',code,' . $this->id;
		}

        return static::$validations;
    }
}
