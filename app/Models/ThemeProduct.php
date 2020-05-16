<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeProduct extends Model
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
		'theme_id',
		'product_id',
	];

	/**
	 * Get the theme that owns the theme product.
	 *
	 */
	public function theme()
	{
		return $this->belongsTo(Theme::class);
    }

	/**
	 * Get the product that owns the theme product.
	 *
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
