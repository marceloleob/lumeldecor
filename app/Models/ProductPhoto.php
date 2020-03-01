<?php

namespace App\Models;

use App\Models\Base;

class ProductPhoto extends Base
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
		'name',
		'extension',
		'size',
		'position',
	];

	/**
	 * Get the product about this photos
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->hasOne('App\Models\Product');
	}
}
