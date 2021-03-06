<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
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
		'slug',
		'status',
	];

	/**
	 * Get the products about this material.
	 *
	 */
	public function products()
	{
		return $this->hasMany(Product::class);
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
