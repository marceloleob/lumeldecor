<?php

namespace App\Models;

use App\Models\Base;

class Color extends Base
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
	 * Get the product photo about this color.
	 *
	 */
	public function productPhoto()
	{
		return $this->hasMany('App\Models\ProductPhoto');
	}
}
