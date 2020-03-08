<?php

namespace App\Models;

use App\Models\Base;

class City extends Base
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
		'state_id',
		'name',
		'capital',
	];

	/**
	 * Get the state that owns the city.
	 *
	 */
	public function state()
	{
		return $this->belongsTo('App\Models\States');
	}

	/**
	 * Get the supplier about this city.
	 *
	 */
	public function suppliers()
	{
		return $this->hasMany('App\Models\Supplier');
	}

	/**
	 * Get the customer about this city.
	 *
	 */
	public function customers()
	{
		return $this->hasMany('App\Models\Customer');
	}
}
