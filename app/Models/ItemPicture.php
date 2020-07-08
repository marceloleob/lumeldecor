<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPicture extends Model
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
		'item_id',
		'name',
	];

	/**
	 * Get the item that owns the picture.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class);
	}
}
