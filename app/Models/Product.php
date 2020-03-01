<?php

namespace App\Models;

use App\Models\Base;

class Product extends Base
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
		'supplier_id',
		'category_id',
		'name',
		'description',
		'status',
	];

	/**
	 * Get the supplier about this product
	 *
	 * @return Supplier
	 */
	public function supplier()
	{
		return $this->HasOne('App\Models\Supplier');
	}

	/**
	 * Get the category about this product
	 *
	 * @return ProductCategory
	 */
	public function category()
	{
		return $this->hasOne('App\Models\Category');
	}

	/**
	 * Get the dimensions about this product
	 *
	 * @return ProductDimension
	 */
	public function dimensions()
	{
		return $this->hasMany('App\Models\ProductDimension');
	}

	/**
	 * Get the photos about this product
	 *
	 * @return ProductPhoto
	 */
	public function photos()
	{
		return $this->hasMany('App\Models\ProductPhoto');
	}
}
