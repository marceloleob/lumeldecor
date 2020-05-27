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
        'category_id',
		'name',
		'description',
		'hashtag',
		'featured',
		'status',
    ];

	/**
	 * Get the category that owns the product.
	 *
	 */
	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	/**
	 * Get the category about this product.
	 *
	 */
	public function material()
	{
		return $this->category()->with('material');
	}

	/**
	 * Get the product about this info.
	 *
	 */
	public function product()
	{
		return $this->hasOne(Product::class);
    }
}
