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
		return $this->belongsTo(Category::class);
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
