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
		'productdimension_id',
		'price',
	];

	/**
	 * Get the supplier about this price
	 *
	 * @return Supplier
	 */
	public function supplier()
	{
		return $this->HasOne('App\Models\Supplier');
	}

	/**
	 * Get the product (dimension) about this product (price)
	 *
	 * @return ProductPrice
	 */
	public function productPrice()
	{
		return $this->HasOne('App\Models\ProductPrice');
	}
}
