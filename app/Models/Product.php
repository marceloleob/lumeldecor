<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
		'code',
		'size',
		'weight',
		'height',
		'width',
		'length',
		'price',
	];

	/**
	 * Get the items about this product.
	 *
	 */
	public function items()
	{
		return $this->hasMany(Item::class);
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
	 * Get the category about this product.
	 *
	 */
	public function category()
	{
		return $this->hasOne(CategoryProduct::class);
	}

	/**
	 * Get the category about this product.
	 *
	 */
	public function material()
	{
		return $this->category()->with('category')->with('material');
	}

	/**
	 * Get the stock about this product.
	 *
	 */
	public function stock()
	{
		return $this->hasMany(Stock::class);
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
