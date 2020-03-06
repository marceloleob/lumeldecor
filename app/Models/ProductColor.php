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
	 * Get the product that owns the product info.
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the product info that owns the photo.
	 *
	 */
	public function productInfo()
	{
		return $this->belongsTo('App\Models\ProductInfo');
	}

	/**
	 * Get the product photo that owns the photo.
	 *
	 */
	public function productPhoto()
	{
		return $this->belongsTo('App\Models\ProductPhoto');
	}

	/**
	 * Get the color that owns the photo.
	 *
	 */
	public function color()
	{
		return $this->belongsTo('App\Models\Color');
	}
}
