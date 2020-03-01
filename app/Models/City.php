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
		'states_id',
		'name',
		'capital',
	];

	/**
	 * Get the states about this city
	 *
	 * @return States
	 */
	public function state()
	{
		return $this->HasOne('App\Models\States');
	}

	/**
	 * Get the supplier about this city
	 *
	 * @return Supplier
	 */
	public function supplier()
	{
		return $this->belongsTo('App\Models\Supplier');
	}
}
