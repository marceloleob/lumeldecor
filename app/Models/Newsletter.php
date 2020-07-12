<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'user_id',
		'user_ip',
		'email',
	];

	/**
	 * Get the user that owns the newsletter.
	 *
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
