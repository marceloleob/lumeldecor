<?php

namespace App\Models;

use App\Models\Base;

class Campaign extends Base
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
		'name',
		'start_day',
		'start_month',
		'finish_day',
		'finish_month',
		'status',
	];

	/**
	 * Get the products about this campaign.
	 *
	 */
	public function products()
	{
		return $this->hasMany(CampaignProduct::class);
	}

	/**
	 * Get the promotions about this campaign.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
