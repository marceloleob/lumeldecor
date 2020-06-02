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
	];

	/**
	 * Get the product that owns the product size.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
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
     * Get the weight formated
     *
     * @param  string  $value
     * @return string
     */
    public function getWeightAttribute($value)
    {
        return number_format($value, 3, ',', '.');
    }

	/**
     * Get the pro_height formated
     *
     * @param  string  $value
     * @return string
     */
    public function getProHeightAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

	/**
     * Get the pro_width formated
     *
     * @param  string  $value
     * @return string
     */
    public function getProWidthAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

	/**
     * Get the pro_length formated
     *
     * @param  string  $value
     * @return string
     */
    public function getProLengthAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

	/**
     * Get the shi_height formated
     *
     * @param  string  $value
     * @return string
     */
    public function getShiHeightAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

	/**
     * Get the shi_width formated
     *
     * @param  string  $value
     * @return string
     */
    public function getShiWidthAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

	/**
     * Get the shi_length formated
     *
     * @param  string  $value
     * @return string
     */
    public function getShiLengthAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
