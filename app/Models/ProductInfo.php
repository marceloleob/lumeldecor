<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
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
        'product_id',
		'name',
		'description',
		'hashtag',
		'featured',
		'status',
    ];

	/**
	 * Get the product that owns the product info.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
    }
}
