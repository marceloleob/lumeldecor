<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
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
		'size',
		'weight',
		'pro_height',
		'pro_width',
		'pro_length',
		'shi_height',
		'shi_width',
		'shi_length',
	];

	/**
	 * Get the product that owns the product size.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

	/**
	 * Get the items about this product size.
	 *
	 */
	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
