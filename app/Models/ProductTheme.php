<?php

namespace App\Models;

use App\Models\Base;

class ProductTheme extends Base
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'product_id',
		'theme_id',
	];

	/**
	 * Get the product that owns the theme.
	 *
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the theme that owns the theme.
	 *
	 */
	public function theme()
	{
		return $this->belongsTo('App\Models\Theme');
	}
}
