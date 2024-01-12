<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
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
        'action',
		'name',
    ];

	/**
	 * Get the stocks about this product.
	 *
	 */
	public function stocks()
	{
		return $this->hasMany(Stock::class);
	}
}
