<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
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
		'hashtag',
		'description',
		'featured',
		'status',
    ];

	/**
	 * Get the category that owns the item.
	 *
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
    }

	/**
	 * Get the product about this item.
	 *
	 */
	public function product()
	{
		return $this->hasOne(Product::class);
	}

	/**
	 * Get the promotions about this item.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
