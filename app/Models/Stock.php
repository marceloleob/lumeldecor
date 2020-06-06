<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
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
        'product_id',
		'item_id',
		'user_id',
		'reason_id',
		'action',
		'incoming',
		'outcoming',
		'balance',
    ];

	/**
	 * Get the product that owns the stock.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
    }

	/**
	 * Get the item that owns the stock.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class);
    }

	/**
	 * Get the user that owns the stock.
	 *
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the reason that owns the stock.
	 *
	 */
	public function reason()
	{
		return $this->belongsTo(Reason::class);
	}
}
