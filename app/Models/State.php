<?php

namespace App\Models;

use App\Models\Base;

class State extends Base
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
		'uf',
		'name',
	];

	/**
	 * Get the cities about this state.
	 *
	 */
	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
