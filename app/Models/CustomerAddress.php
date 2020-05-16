<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
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
		'customer_id',
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
	 * Get the customer that owns the customer.
	 *
	 */
	public function customer()
	{
		return $this->belongsTo(Customer::class);
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
