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
     * The relationships that should always be loaded.
     *
     * @var array
     */
	protected $with = ['category'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
        'material_id',
        'category_id',
		'name',
		'slug',
		'picture',
		'description',
		'hashtag',
		'featured',
		'launch',
		'done',
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
	 * Get the material about this product.
	 *
	 */
	public function material()
	{
		return $this->belongsTo(Material::class, 'material_id', 'id');
		// return $this->category()->with('material');
		// return $this->belongsToThrough(Material::class, Category::class);
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
