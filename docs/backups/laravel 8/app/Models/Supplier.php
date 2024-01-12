<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
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
		'city_id',
		'code',
		'kind',
		'document',
		'company',
		'phone',
		'email',
		'address',
		'number',
		'comp',
		'neighborhood',
		'zipcode',
		'website',
		'status',
	];

	/**
	 * Get the city that owns the supplier.
	 *
	 */
	public function city()
	{
		return $this->belongsTo(City::class);
	}

	/**
	 * Get the contacts about this supplier.
	 *
	 */
	public function contacts()
	{
		return $this->hasMany(SupplierContact::class);
	}

	/**
	 * Get the items about this supplier.
	 *
	 */
	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
