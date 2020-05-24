<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeItem extends Model
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
		'theme_id',
		'item_id',
	];

	/**
	 * Get the themes that owns the item.
	 *
	 */
	public function themes()
	{
		return $this->belongsTo(Theme::class);
    }

	/**
	 * Get the items that owns the theme.
	 *
	 */
	public function items()
	{
		return $this->belongsTo(Item::class);
	}
}
