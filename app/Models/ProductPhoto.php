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
	];

	/**
	 * Get the info that owns the photo.
	 *
	 */
	public function info()
	{
		return $this->belongsTo('App\Models\ProductInfo');
	}

	/**
	 * Get the colors about this photo.
	 *
	 */
	public function colors()
	{
		return $this->hasMany('App\Models\ProductColor');
	}

	/**
	 * Get the items about this photo.
	 *
	 */
	public function items()
	{
		return $this->hasMany('App\Models\ProductItem');
	}
}
