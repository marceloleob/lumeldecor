<?php

namespace App\Models;

use App\Models\Base;

class Category extends Base
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
		'material_id',
		'name',
		'status',
	];

	/**
	 * Get the material that owns the category.
	 *
	 */
	public function material()
	{
		return $this->belongsTo(Material::class);
	}

	/**
	 * Get the products about this category.
	 *
	 */
	public function products()
	{
		return $this->hasMany(Product::class);
	}

	/**
	 * Get the promotions about this category.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
