<?php

namespace App\Models;

use App\Models\Base;

class Theme extends Base
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'start_day',
		'start_month',
		'finish_day',
		'finish_month',
		'status',
	];

	/**
	 * Get the product theme about this theme.
	 *
	 */
	public function productThemes()
	{
		return $this->hasMany('App\Models\ProductTheme');
	}

	/**
	 * Get the promotions about this theme.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany('App\Models\OfferPromotion');
	}
}
