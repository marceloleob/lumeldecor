<?php

namespace App\Models;

use App\Models\Base;

class Product extends Base
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
		'supplier_id',
		'category_id',
		'code',
		'name',
		'description',
		'status',
	];

	/**
	 * Get the supplier that owns the product.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo('App\Models\Supplier');
	}

	/**
	 * Get the category that owns the product.
	 *
	 */
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	/**
	 * Get the infos about this product.
	 *
	 */
	public function infos()
	{
		return $this->hasMany('App\Models\ProductInfo');
	}

	/**
	 * Get the colors about this product.
	 *
	 */
	public function colors()
	{
		return $this->hasMany('App\Models\ProductColor');
	}

	/**
	 * Get the items about this product.
	 *
	 */
	public function items()
	{
		return $this->hasMany('App\Models\ProductItem');
	}

	/**
	 * Get the themes about this product.
	 *
	 */
	public function themes()
	{
		return $this->hasMany('App\Models\ProductTheme');
	}

	/**
	 * Get the promotions about this product.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany('App\Models\OfferPromotion');
	}
}
