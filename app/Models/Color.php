<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
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
		'name',
		'hexa',
		'status',
	];

	/**
	 * Get the items about this color.
	 *
	 */
	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
