<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
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
		return $this->belongsTo(State::class);
	}

	/**
	 * Get the users about this city.
	 *
	 */
	public function users()
	{
		return $this->hasMany(UserAddress::class);
	}

	/**
	 * Get the supplier about this city.
	 *
	 */
	public function suppliers()
	{
		return $this->hasMany(Supplier::class);
	}
}
