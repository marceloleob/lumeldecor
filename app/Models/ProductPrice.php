<?php

namespace App\Models;

use App\Models\Base;

class ProductPrice extends Base
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
		'product_dimension_id',
		'amount',
		'price',
	];

	/**
	 * Get the product (dimension) about this product (price)
	 *
	 * @return ProductDimension
	 */
	public function dimensions()
	{
		return $this->hasOne('App\Models\ProductDimension');
	}
}
