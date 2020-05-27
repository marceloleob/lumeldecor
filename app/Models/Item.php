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
		'product_id',
		'supplier_id',
		'color_id',
		'code',
		'image',
		'p_price',
		's_price',
		'launch',
		'status',
	];

	/**
	 * Get the product that owns the item.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	/**
	 * Get the supplier that owns the item.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	/**
	 * Get the color that owns the product info.
	 *
	 */
	public function color()
	{
		return $this->belongsTo(Color::class);
	}

	/**
	 * Get the product supplier about this product.
	 *
	 */
	public function productSupplier()
	{
		return $this->hasMany(ProductSupplier::class);
	}

	/**
	 * Get the campaign about this item.
	 *
	 */
	public function campaign()
	{
		return $this->hasOne(CampaignItem::class);
	}

	/**
	 * Get the themes about this item.
	 *
	 */
	public function themes()
	{
		return $this->hasMany(ThemeItem::class);
	}

	/**
	 * Get the stock about this item.
	 *
	 */
	public function stock()
	{
		return $this->hasMany(Stock::class);
	}
}
