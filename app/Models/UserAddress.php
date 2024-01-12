<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
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
		'address',
		'number',
		'complement',
		'neighborhood',
		'zipcode',
		'delivery',
		'billing',
		'status',
	];

	/**
	 * Get the user that owns the address.
	 *
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the city that owns the address.
	 *
	 */
	public function city()
	{
		return $this->belongsTo(City::class);
	}
}
