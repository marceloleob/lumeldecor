<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tone extends Model
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
		'color_id',
		'name',
		'hexa',
		'status',
	];

	/**
	 * Get the colors that owns the tone.
	 *
	 */
	public function colors()
	{
		return $this->belongsTo(Color::class, 'color_id', 'id');
	}

	/**
	 * Get the items about this color.
	 *
	 */
	public function items()
	{
		return $this->belongsToMany(Item::class);
	}
}
