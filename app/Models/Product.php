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
	 * Get the supplier that owns the product.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo('App\Models\Supplier');
	}

	/**
	 * Get the category that owns the product.
	 *
	 */
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	/**
	 * Get the infos about this product.
	 *
	 */
	public function infos()
	{
		return $this->hasMany('App\Models\ProductInfo');
	}

	/**
	 * Get the product color about this product.
	 *
	 */
	public function productColor()
	{
		return $this->hasMany('App\Models\ProductColor');
	}
}
