<?php

namespace App\Models;

use App\Models\Base;

class CampaignProduct extends Base
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
		'campaign_id',
		'product_id',
	];

	/**
	 * Get the campaign that owns the campaign's product.
	 *
	 */
	public function campaign()
	{
		return $this->belongsTo(Campaign::class);
    }

	/**
	 * Get the product that owns the campaign's product.
	 *
	 */
	public function products()
	{
		return $this->belongsTo(Product::class);
	}
}
