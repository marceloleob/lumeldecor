<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCookie extends Model
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The relationships that should always be loaded.
	 *
	 * @var array
	 */
	protected $with = ['shopCart'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'cookie_hash',
	];

	/**
	 * Get the shopcart about this cookie.
	 *
	 */
	public function shopCart()
	{
		return $this->hasMany(ShopCart::class);
	}
}
