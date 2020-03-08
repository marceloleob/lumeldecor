<?php

namespace App\Models;

use App\Models\Base;

class UserRule extends Base
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
		'status',
	];

	/**
	 * Get the users about this rule.
	 *
	 */
	public function users()
	{
		return $this->hasMany('App\Models\User');
	}
}
