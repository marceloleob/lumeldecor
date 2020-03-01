<?php

namespace App\Models;

use App\Models\Base;

class Category extends Base
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
		'material_id',
		'name',
		'status',
	];

	/**
	 * Get the material about this category
	 *
	 * @return Material
	 */
	public function material()
	{
		return $this->belongsTo('App\Models\Material', 'material.name AS material');
	}
}
