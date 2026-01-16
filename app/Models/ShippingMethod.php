<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'type',
        'base_cost',
        'estimated_days',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'base_cost' => 'decimal:2',
    ];
}
