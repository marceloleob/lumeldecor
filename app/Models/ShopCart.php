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
	 * The relationships that should always be loaded.
	 *
	 * @var array
	 */
	protected $with = ['item'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_ip',
		'item_id',
		'quantity',
		'expirate_at',
	];

	/**
	 * Get the item that the shopcart belongs to.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class, 'item_id', 'id');
	}
}
