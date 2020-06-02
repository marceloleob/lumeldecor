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
		'product_size_id',
		'supplier_id',
		'code',
		'picture',
		'p_price',
		's_price',
		'launch',
		'status',
	];

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
		return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
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
	 * Get the colors about this item.
	 *
	 */
	public function colors()
	{
		return $this->belongsToMany(Color::class, 'item_colors');
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
     * Get the p_price formated
     *
     * @param  string  $value
     * @return string
     */
    public function getPPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

	/**
     * Get the s_price formated
     *
     * @param  string  $value
     * @return string
     */
    public function getSPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
