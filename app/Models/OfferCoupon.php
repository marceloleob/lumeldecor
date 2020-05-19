<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferCoupon extends Model
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
		'kind',
		'amount',
		'start_date',
		'finish_date',
		'status',
	];
}
