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
		'product_info_id',
		'name',
		'extension',
		'size',
		'position',
		'aumont',
	];

	/**
	 * Get the product info that owns the photo.
	 *
	 */
	public function productInfo()
	{
		return $this->belongsTo('App\Models\ProductInfo');
	}

	/**
	 * Get the product color about this product photo.
	 *
	 */
	public function productColor()
	{
		return $this->hasMany('App\Models\ProductColor');
	}
}
