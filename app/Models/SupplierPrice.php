<?php

namespace App\Models;

use App\Models\Base;

class SupplierPrice extends Base
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'supplier_id',
		'product_info_id',
		'price',
	];

	/**
	 * Get the supplier that owns the supplier price.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo('App\Models\Supplier');
	}

	/**
	 * Get the product that owns the supplier price.
	 *
	 */
	public function productInfo()
	{
		return $this->belongsTo('App\Models\ProductInfo');
	}
}
