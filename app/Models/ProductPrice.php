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
	 * @return ProductPrice
	 */
	public function productPrice()
	{
		return $this->hasOne('App\Models\ProductPrice');
	}
}
