<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignItem extends Model
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
		'item_id',
	];

	/**
	 * Get the campaign that owns the campaign.
	 *
	 */
	public function campaign()
	{
		return $this->belongsTo(Campaign::class);
    }

	/**
	 * Get the items that owns the campaign.
	 *
	 */
	public function items()
	{
		return $this->belongsTo(Item::class);
	}

    /**
	 * Get the product that owns the campaign.
	 *
	 */
	public function products()
	{
		return $this->items()->with();
	}
}
