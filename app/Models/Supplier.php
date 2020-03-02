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
		'website',
		'status',
	];

	/**
	 * Get the city that owns the supplier.
	 *
	 */
	public function city()
	{
		return $this->belongsTo('App\Models\City');
	}

	/**
	 * Get the contact about this supplier.
	 *
	 */
	public function contact()
	{
		return $this->hasMany('App\Models\SupplierContact');
	}

	/**
	 * Get the product about this supplier.
	 *
	 */
	public function product()
	{
		return $this->hasMany('App\Models\Product');
	}

	/**
	 * Get the price about this supplier.
	 *
	 */
	public function supplierPrice()
	{
		return $this->hasMany('App\Models\SupplierPrice');
	}
}
