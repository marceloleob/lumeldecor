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
		'category_id',
		'code',
		'size',
		'weight',
		'height',
		'width',
		'length',
		'amount',
		'price_site',
		'price_supp',
		'status',
	];

	/**
	 * Get the category that owns the product.
	 *
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * Get the colors about this product.
	 *
	 */
	public function colors()
	{
		return $this->hasMany(ProductColor::class);
	}

	/**
	 * Get the info about this product.
	 *
	 */
	public function info()
	{
		return $this->hasOne(ProductInfo::class);
	}

	/**
	 * Get the photos about this product.
	 *
	 */
	public function photos()
	{
		return $this->hasMany(ProductPhoto::class);
	}

	/**
	 * Get the themes about this product.
	 *
	 */
	public function themes()
	{
		return $this->hasMany(ProductTheme::class);
	}

	/**
	 * Get the promotions about this product.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
