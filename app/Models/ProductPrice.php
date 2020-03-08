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
	public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'product_info_id',
		'price',
	];

	/**
	 * Get the info that owns the price.
	 *
	 */
	public function info()
	{
		return $this->belongsTo('App\Models\ProductInfo');
	}
}
