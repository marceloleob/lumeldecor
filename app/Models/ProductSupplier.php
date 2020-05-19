<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
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
		'item_id',
		'supplier_id',
		'price',
    ];

	/**
	 * Get the item that owns the product supplier.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class);
    }

	/**
	 * Get the supplier that owns the product supplier.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
    }
}
