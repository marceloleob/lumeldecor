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
		'status',
	];

	/**
	 * Get the tones about this color.
	 *
	 */
	public function tones()
	{
		return $this->hasMany(Tone::class);
	}
}
