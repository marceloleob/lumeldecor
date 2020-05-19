<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
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
	 * Get the items about this theme.
	 *
	 */
	public function items()
	{
		return $this->hasMany(ItemTheme::class);
	}

	/**
	 * Get the product about this theme.
	 *
	 */
	public function products()
	{
		return $this->items()->with('product');
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
