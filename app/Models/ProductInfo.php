<?php

namespace App\Models;

use App\Models\Base;

class ProductInfo extends Base
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
		'product_id',
		'color_id',
		'amount',
		'size',
		'weight',
		'height',
		'width',
		'length',
	];

	/**
	 * Get the product about this info
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->hasOne('App\Models\Product');
	}
}
