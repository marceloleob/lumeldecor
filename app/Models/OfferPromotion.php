<?php

namespace App\Models;

use App\Models\Base;

class OfferPromotion extends Base
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
		'material_id',
		'category_id',
		'theme_id',
		'product_id',
		'kind',
		'value',
		'start_date',
		'finish_date',
		'status',
	];

	/**
	 * Get the material that owns the promotion.
	 *
	 */
	public function material()
	{
		return $this->belongsTo('App\Models\Material');
	}

	/**
	 * Get the category that owns the promotion.
	 *
	 */
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	/**
	 * Get the theme that owns the promotion.
	 *
	 */
	public function theme()
	{
		return $this->belongsTo('App\Models\Theme');
	}

	/**
	 * Get the product that owns the promotion.
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}
}
