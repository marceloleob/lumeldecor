<?php

namespace App\Models;

use App\Models\Base;

class ProductInfoTheme extends Base
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
		'theme_id',
	];

	/**
	 * Get the product that owns the theme product.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(ProductInfo::class);
	}

	/**
	 * Get the theme that owns the theme product.
	 *
	 */
	public function theme()
	{
		return $this->belongsTo(Theme::class);
    }
}
