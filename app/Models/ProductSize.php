<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
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
	// protected $with = ['product', 'items'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'product_id',
		'size',
		'weight',
		'shape',
		'pro_height',
		'pro_width',
		'pro_length',
		'shi_height',
		'shi_width',
		'shi_length',
		'status',
	];

	/**
	 * Get the product that owns the product size.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	/**
	 * Get the items about this product size.
	 *
	 */
	public function items()
	{
		return $this->hasMany(Item::class);
	}

	/**
	 * Get the weight
	 *
	 * @param  string  $value
	 * @return float
	 */
	public function getWeightAttribute($value)
	{
		return (float) $value;
	}

	/**
	 * Get the weight formatted
	 *
	 * @return string
	 */
	public function getWeightFormattedAttribute()
	{
		return number_format($this->weight, 3, ',', '.');
	}

	/**
	 * Get the pro_height
	 *
	 * @param  string  $value
	 * @return float
	 */
	public function getProHeightAttribute($value)
	{
		return (float) $value;
	}

	/**
	 * Get the pro_height formatted
	 *
	 * @return string
	 */
	public function getProHeightFormattedAttribute()
	{
		return number_format($this->pro_height, 2, ',', '.');
	}

	/**
	 * Get the pro_width
	 *
	 * @param  string  $value
	 * @return float
	 */
	public function getProWidthAttribute($value)
	{
		return (float) $value;
	}

	/**
	 * Get the pro_width formatted
	 *
	 * @return string
	 */
	public function getProWidthFormattedAttribute()
	{
		return number_format($this->pro_width, 2, ',', '.');
	}

	/**
	 * Get the pro_length
	 *
	 * @param  string  $value
	 * @return float
	 */
	public function getProLengthAttribute($value)
	{
		return (float) $value;
	}

	/**
	 * Get the pro_length formatted
	 *
	 * @return string
	 */
	public function getProLengthFormattedAttribute()
	{
		return number_format($this->pro_length, 2, ',', '.');
	}

	/**
	 * Get the shi_height
	 *
	 * @param  string  $value
	 * @return integer
	 */
	public function getShiHeightAttribute($value)
	{
		return (int) $value;
	}

	/**
	 * Get the shi_height formatted
	 *
	 * @return string
	 */
	public function getShiHeightFormattedAttribute()
	{
		return number_format($this->shi_height, 2, ',', '.');
	}

	/**
	 * Get the shi_width
	 *
	 * @param  string  $value
	 * @return integer
	 */
	public function getShiWidthAttribute($value)
	{
		return (int) $value;
	}

	/**
	 * Get the shi_width formatted
	 *
	 * @return string
	 */
	public function getShiWidthFormattedAttribute()
	{
		return number_format($this->shi_width, 2, ',', '.');
	}

	/**
	 * Get the shi_length
	 *
	 * @param  string  $value
	 * @return integer
	 */
	public function getShiLengthAttribute($value)
	{
		return (int) $value;
	}

	/**
	 * Get the shi_length formatted
	 *
	 * @return string
	 */
	public function getShiLengthFormattedAttribute()
	{
		return number_format($this->shi_length, 2, ',', '.');
	}
}
