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
		'show',
		'status',
	];

	/**
	 * Get the products about this theme.
	 *
	 */
	public function products()
	{
		return $this->hasMany(ThemeProduct::class);
	}

	/**
	 * Get the promotions about this theme.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
