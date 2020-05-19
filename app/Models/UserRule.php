<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRule extends Model
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
		return $this->hasMany(User::class);
	}
}
