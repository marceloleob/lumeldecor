<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
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
		'slug',
		'show',
		'status',
	];

	/**
	 * Get the items about this theme.
	 *
	 */
	public function items()
	{
		return $this->belongsToMany(Item::class);
	}

	/**
	 * Get the campaigns about this theme.
	 *
	 */
	public function campaigns()
	{
		return $this->hasMany(CampaignItem::class);
	}

	/**
	 * Get the promotions about this theme.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
