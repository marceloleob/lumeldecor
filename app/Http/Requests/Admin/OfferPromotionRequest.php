<?php

namespace App\Http\Requests\Admin;

use App\Filters\Checkbox;
use App\Filters\Money;
use App\Filters\Nullable;
use App\Http\Requests\BaseRequest;

class OfferPromotionRequest extends BaseRequest
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
		'money'    => Money::class,
		'nullable' => Nullable::class,
	];

    /**
     * Filter rules
     *
     * @var array
     */
    public static $filters = [
        'id'           => 'digit',
        'material_id'  => 'digit|nullable',
        'category_id'  => 'digit|nullable',
        'theme_id'     => 'digit|nullable',
        'campaign_id'  => 'digit|nullable',
        'product_id'   => 'digit|nullable',
        'item_id'      => 'digit|nullable',
        'name'         => 'trim|escape',
        'kind'         => 'trim|escape|uppercase',
        'amount'       => 'money',
        'start_date'   => 'trim|format_date:d/m/Y,Y-m-d',
        'finish_date'  => 'trim|format_date:d/m/Y,Y-m-d',
        'status'       => 'checkbox|cast:boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $validations = [
        'id'           => 'integer',
        'material_id'  => 'numeric|nullable',
        'category_id'  => 'numeric|nullable',
        'theme_id'     => 'numeric|nullable',
        'campaign_id'  => 'numeric|nullable',
        'product_id'   => 'numeric|nullable',
        'item_id'      => 'numeric|nullable',
		'name'         => 'required|min:2|max:150|unique:offer_promotions',
		'kind'         => 'required|string|required_with:V,P',
		'amount'       => "required|regex:/^\d+(\.\d{1,2})?$/",
        'start_date'   => 'required|date',
        'finish_date'  => 'required|date',
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
