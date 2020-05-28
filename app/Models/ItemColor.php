<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemColor extends Model
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
		'item_id',
		'color_id',
	];

	/**
	 * Get the items that owns the color.
	 *
	 */
	public function items()
	{
		return $this->belongsTo(Item::class);
	}

	/**
	 * Get the colors that owns the item.
	 *
	 */
	public function colors()
	{
		return $this->belongsTo(Color::class);
    }
}
