<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
		'slug',
		'picture',
		'description',
		'hashtag',
		'featured',
		'launch',
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
	 * Get the sizes about this product.
	 *
	 */
	public function sizes()
	{
		return $this->hasMany(ProductSize::class);
	}

	/**
	 * Get the stocks about this product.
	 *
	 */
	public function stock()
	{
		return $this->hasMany(Stock::class);
	}

	/**
	 * Get the promotions about this product.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
