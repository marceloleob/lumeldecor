<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'cartable_type',
        'cartable_id',
        'quantity',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getSubtotalAttribute(): float
    {
        return $this->price * $this->quantity;
    }

    public function getNameAttribute(): string
    {
        return $this->cartable->full_name ?? $this->cartable->name;
    }

    public function getImageAttribute(): ?string
    {
        if ($this->cartable instanceof ProductItem) {
            return $this->cartable->primaryImage?->url;
        }

        return null;
    }
}
