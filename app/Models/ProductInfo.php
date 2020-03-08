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
		'size',
		'weight',
		'height',
		'width',
		'length',
	];

	/**
	 * Get the product that owns the info.
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the photos about this info.
	 *
	 * @return photos
	 */
	public function photos()
	{
		return $this->hasMany('App\Models\ProductPhoto');
	}

	/**
	 * Get the colors about this info.
	 *
	 */
	public function colors()
	{
		return $this->hasMany('App\Models\ProductColor');
	}

	/**
	 * Get the items about this info.
	 *
	 */
	public function items()
	{
		return $this->hasMany('App\Models\ProductItem');
	}

	/**
	 * Get the product price about this info.
	 *
	 */
	public function productPrice()
	{
		return $this->hasOne('App\Models\ProductPrice');
	}

	/**
	 * Get the supplier price about this info.
	 *
	 */
	public function supplierPrice()
	{
		return $this->hasOne('App\Models\SupplierPrice');
	}
}
