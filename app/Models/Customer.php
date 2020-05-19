<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
		'document',
		'telephone',
		'cellphone',
		'status',
	];

	/**
	 * Get the user that owns the customer.
	 *
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
