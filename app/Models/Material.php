<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
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
		'name',
		'status',
	];

	/**
	 * Get the categories about this material.
	 *
	 */
	public function categories()
	{
		return $this->hasMany(Category::class);
	}

    /**
     * Get all of the products for the material.
     */
    public function products()
    {
		return $this->hasMany(Category::class);
        // return $this->hasManyThrough(Product::class, Category::class);
	}

	/**
	 * Get the promotions about this material.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
