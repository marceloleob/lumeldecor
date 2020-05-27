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
		'product_info_id',
		'slug',
		'size',
		'weight',
		'height',
		'width',
		'length',
		'status',
	];

	/**
	 * Get the info that owns the product.
	 *
	 */
	public function info()
	{
		return $this->belongsTo(ProductInfo::class, 'product_info_id', 'id');
	}

	/**
	 * Get the category about this product.
	 *
	 */
	public function category()
	{
		return $this->info()->with('category');
	}

	/**
	 * Get the category about this product.
	 *
	 */
	public function material()
	{
		return $this->category()->with('material');
	}

	/**
	 * Get the items about this product.
	 *
	 */
	public function productItems()
	{
		return $this->hasMany(Item::class);
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
