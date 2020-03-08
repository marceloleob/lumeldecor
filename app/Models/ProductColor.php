<?php

namespace App\Models;

use App\Models\Base;

class ProductColor extends Base
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
		'product_info_id',
		'product_photo_id',
		'color_id',
	];

	/**
	 * Get the product that owns the color.
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the info that owns the color.
	 *
	 */
	public function info()
	{
		return $this->belongsTo('App\Models\ProductInfo');
	}

	/**
	 * Get the photo that owns the color.
	 *
	 */
	public function photo()
	{
		return $this->belongsTo('App\Models\ProductPhoto');
	}

	/**
	 * Get the color that owns the color.
	 *
	 */
	public function color()
	{
		return $this->belongsTo('App\Models\Color');
	}
}
