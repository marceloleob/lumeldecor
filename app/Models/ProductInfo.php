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
	 * Get the product that owns the product info.
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the photos about this product info.
	 *
	 * @return photos
	 */
	public function productPhoto()
	{
		return $this->hasMany('App\Models\ProductPhoto');
	}

	/**
	 * Get the product price about this product info.
	 *
	 */
	public function productPrice()
	{
		return $this->hasOne('App\Models\ProductPrice');
	}

	/**
	 * Get the product color about this product info.
	 *
	 */
	public function productColor()
	{
		return $this->hasMany('App\Models\ProductColor');
	}

	/**
	 * Get the supplier price about this product info.
	 *
	 */
	public function supplierPrice()
	{
		return $this->hasOne('App\Models\SupplierPrice');
	}
}
