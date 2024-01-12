<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
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
		'name',
		'start_day',
		'start_month',
		'finish_day',
		'finish_month',
		'status',
	];

	/**
	 * Get the themes that owns the campaign.
	 *
	 */
	public function themes()
	{
		return $this->belongsTo(Theme::class);
	}
}
