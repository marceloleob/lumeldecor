<?php

namespace App\Models;

use App\Models\Base;

class SupplierContact extends Base
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
		'supplier_id',
		'name',
		'email',
		'telephone',
		'cellphone',
		'position',
	];

	/**
	 * Get the supplier that owns the contact.
	 *
	 */
	public function supplier()
	{
		return $this->belongsTo('App\Models\Supplier');
	}
}
