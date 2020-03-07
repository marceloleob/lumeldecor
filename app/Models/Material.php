<?php

namespace App\Models;

use App\Models\Base;

class Material extends Base
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
		'status',
	];

	/**
	 * Get the category about this material.
	 *
	 */
	public function category()
	{
		return $this->hasMany('App\Models\Category');
	}

	/**
	 * Get the promotion about this material.
	 *
	 */
	public function promotion()
	{
		return $this->hasMany('App\Models\OfferPromotion');
	}
}
