<?php

namespace App\Models;

use App\Models\Base;

class Supplier extends Base
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
		'site',
		'status',
	];

	/**
	 * Get the city about this supplier
	 *
	 * @return City
	 */
	public function city()
	{
		return $this->hasOne('App\Models\City');
	}

	/**
	 * Get the product about this supplier
	 *
	 * @return Product
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}

	/**
	 * Get the contacts about this supplier
	 *
	 * @return SupplierContact
	 */
	public function supplierContact()
	{
		return $this->hasMany('App\Models\SupplierContact');
	}
}
