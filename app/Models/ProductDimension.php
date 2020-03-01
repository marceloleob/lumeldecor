<?php

namespace App\Models;

use App\Models\Base;

class ProductDimension extends Base
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
		'weight',
		'size',
		'height',
		'width',
		'length',
	];

	/**
	 * Get the product about this dimensions
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->hasOne('App\Models\Product');
	}
}
