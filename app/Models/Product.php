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
		'item_id',
		'supplier_id',
		'code',
		'size',
		'weight',
		'height',
		'width',
		'length',
		'p_price', // purchase price
		's_price', // sale price
	];

	/**
	 * Get the item that owns the product.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	/**
	 * Get the supplier that owns the product.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	/**
	 * Get the campaigns about this product.
	 *
	 */
	public function campaign()
	{
		return $this->hasMany(CampaignProduct::class);
	}

	/**
	 * Get the infos about this product.
	 *
	 */
	public function infos()
	{
		return $this->hasMany(ProductInfo::class);
	}

	/**
	 * Get the themes about this product.
	 *
	 */
	public function themes()
	{
		return $this->hasMany(ThemeProduct::class);
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
