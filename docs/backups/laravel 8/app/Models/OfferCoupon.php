<?php

namespace App\Models;

use Carbon\Carbon;
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

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'start_date',
		'finish_date',
		'created_at',
		'updated_at'
	];

	/**
	 * Get the start date.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getAmountAttribute($value)
	{
		return number_format($value, 2, ',', '.');
	}

	/**
	 * Get the start date.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getStartDateAttribute($value)
	{
	    return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}

	/**
	 * Get the finish date.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getFinishDateAttribute($value)
	{
	    return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}
}
