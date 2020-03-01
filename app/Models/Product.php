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
		'code',
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
	 * @return category
	 */
	public function category()
	{
		return $this->hasOne('App\Models\Category');
	}

	/**
	 * Get the infos about this product
	 *
	 * @return ProductInfo
	 */
	public function infos()
	{
		return $this->hasMany('App\Models\ProductInfo');
	}

	/**
	 * Get the photos about this product
	 *
	 * @return photos
	 */
	public function photos()
	{
		return $this->hasMany('App\Models\ProductPhoto');
	}
}
