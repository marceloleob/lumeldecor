<?php

namespace App\Models;

use App\Models\Base;

class Customer extends Base
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
		'user_id',
		'city_id',
		'document',
		'telephone',
		'cellphone',
		'address',
		'number',
		'comp',
		'neighborhood',
		'zipcode',
		'status',
	];

	/**
	 * Get the user that owns the customer.
	 *
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the city that owns the customer.
	 *
	 */
	public function city()
	{
		return $this->belongsTo(City::class);
	}
}
