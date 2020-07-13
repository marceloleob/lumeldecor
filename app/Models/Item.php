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
	 * The relationships that should always be loaded.
	 *
	 * @var array
	 */
	protected $with = ['tones', 'themes', 'pictures'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'product_id',
		'product_size_id',
		'supplier_id',
		'sku',
		'slug',
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
	 * Get the product-size that owns the item.
	 *
	 */
	public function productSize()
	{
		return $this->belongsTo(ProductSize::class, 'product_size_id', 'id');
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
	 * Get the tones about this item.
	 *
	 */
	public function tones()
	{
		return $this->belongsToMany(Tone::class, 'item_tones');
	}

	/**
	 * Get the themes about this item.
	 *
	 */
	public function themes()
	{
		return $this->belongsToMany(Theme::class, 'item_themes');
	}

	/**
	 * Get the pictures about this item.
	 *
	 */
	public function pictures()
	{
		return $this->hasMany(ItemPicture::class);
	}

	/**
	 * Get the stock about this item.
	 *
	 */
	public function stock()
	{
		return $this->hasMany(Stock::class);
	}

	/**
	 * Get the promotions about this item.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}

	/**
	 * Get the shopcart about this item.
	 *
	 */
	public function shopCart()
	{
		return $this->hasOne(ShopCart::class);
	}

	/**
	 * Get the name of Product
	 *
	 * @return string
	 */
	public function getNameAttribute()
	{
		return $this->product->name;
	}

	/**
	 * Get the p_price
	 *
	 * @param  string  $value
	 * @return float
	 */
	public function getPPriceAttribute($value)
	{
		return (float) $value;
	}

	/**
	 * Get the s_price
	 *
	 * @param  string  $value
	 * @return float
	 */
	public function getSPriceAttribute($value)
	{
		return (float) $value;
	}

	/**
	 * Get the p_price formatted
	 *
	 * @return string
	 */
	public function getPPriceFormattedAttribute()
	{
		return number_format($this->p_price, 2, ',', '.');
	}

	/**
	 * Get the s_price formatted
	 *
	 * @return string
	 */
	public function getSPriceFormattedAttribute()
	{
		return number_format($this->s_price, 2, ',', '.');
	}
}
