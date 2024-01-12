<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OfferPromotion extends Model
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
		'material_id',
		'category_id',
		'theme_id',
		'product_id',
		'item_id',
		'name',
		'kind',
		'amount',
		'start_date',
		'finish_date',
		'status',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'start_date',
		'finish_date',
		'created_at',
		'updated_at'
	];

	/**
	 * Get the material that owns the promotion.
	 *
	 */
	public function material()
	{
		return $this->belongsTo(Material::class);
	}

	/**
	 * Get the category that owns the promotion.
	 *
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * Get the theme that owns the promotion.
	 *
	 */
	public function theme()
	{
		return $this->belongsTo(Theme::class);
	}

	/**
	 * Get the product that owns the promotion.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	/**
	 * Get the item that owns the promotion.
	 *
	 */
	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	/**
	 * Get the start date.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getAmountAttribute($value)
	{
		return number_format($value, 2, ',', '.');
	}

	/**
	 * Get the start date.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getStartDateAttribute($value)
	{
	    return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}

	/**
	 * Get the finish date.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getFinishDateAttribute($value)
	{
	    return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}
}
