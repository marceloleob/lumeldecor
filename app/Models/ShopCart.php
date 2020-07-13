<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
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
		'shop_cookie_id',
		'item_id',
		'user_ip',
		'quantity',
	];

	/**
	 * Get the cookie that owns this shopcart.
	 *
	 */
	public function shopCookie()
	{
		return $this->belongsTo(ShopCookie::class);
	}

	/**
	 * Get the item that the shopcart belongs to.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class);
	}
}
