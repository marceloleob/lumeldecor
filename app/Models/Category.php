<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
		'material_id',
		'name',
		'status',
	];

	/**
	 * Customiza o formato enviado para a view
	 *
	 * @return array
	 */
	public function format()
	{
		return [
			'id'       => $this->id,
			'name'     => $this->name,
			'status'   => $this->status,
			'material' => $this->material->name,
		];
	}

	/**
	 * Get the material that owns the category.
	 *
	 */
	public function material()
	{
		return $this->belongsTo(Material::class);
	}

	/**
	 * Get the products about this category.
	 *
	 */
	public function products()
	{
		return $this->hasMany(CategoryProduct::class);
	}

	/**
	 * Get the promotions about this category.
	 *
	 */
	public function promotions()
	{
		return $this->hasMany(OfferPromotion::class);
	}
}
