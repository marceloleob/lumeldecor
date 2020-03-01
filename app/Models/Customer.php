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
	 * Get the user about this customer
	 *
	 * @return User
	 */
	public function user()
	{
		return $this->hasOne('App\Models\User');
	}

	/**
	 * Get the city about this customer
	 *
	 * @return City
	 */
	public function city()
	{
		return $this->hasOne('App\Models\City');
	}
}
