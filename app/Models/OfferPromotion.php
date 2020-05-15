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
		'name',
		'kind',
		'amount',
		'start_day',
		'start_month',
		'finish_day',
		'finish_month',
		'status',
	];

	/**
	 * Get the material that owns the promotion.
	 *
	 */
	public function material()
	{
		return $this->belongsTo(Material::class);
	}

	/**
	 * Get the category that owns the promotion.
	 *
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * Get the theme that owns the promotion.
	 *
	 */
	public function theme()
	{
		return $this->belongsTo(Theme::class);
	}

	/**
	 * Get the product that owns the promotion.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
