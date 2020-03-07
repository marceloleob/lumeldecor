<?php

namespace App\Models;

use App\Models\Base;

class OfferCoupon extends Base
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
		'name',
		'code',
		'start_date',
		'finish_date',
		'status',
	];
}
