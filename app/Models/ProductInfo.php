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
	 * Get the product that owns the product info.
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the color that owns the product info.
	 *
	 */
	public function color()
	{
		return $this->belongsTo('App\Models\Color');
	}

	/**
	 * Get the product price about this product.
	 *
	 */
	public function productPrice()
	{
		return $this->hasOne('App\Models\ProductPrice');
	}

	/**
	 * Get the supplier price about this product.
	 *
	 */
	public function supplierPrice()
	{
		return $this->hasOne('App\Models\SupplierPrice');
	}
}
