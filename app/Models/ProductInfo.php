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
		'image',
		'launch',
	];

	/**
	 * Get the product that owns the product info.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	/**
	 * Get the color that owns the product info.
	 *
	 */
	public function color()
	{
		return $this->belongsTo(Color::class);
	}
}
