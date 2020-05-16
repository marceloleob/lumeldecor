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
	 * Get the categories about this material.
	 *
	 */
	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	/**
	 * Get the promotions about this material.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
