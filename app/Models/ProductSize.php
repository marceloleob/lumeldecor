<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductSize extends Model
{
    protected $fillable = [
        'product_id',
        'size',
        'shape',
        'weight',
        'width',
        'height',
        'length',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(ProductItem::class);
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getFullNameAttribute(): string
    {
        $parts = [$this->product->name, $this->size];

        if ($this->shape) {
            $parts[] = $this->shape;
        }

        return implode(' - ', $parts);
    }

    public function getDimensionsAttribute(): ?string
    {
        $dimensions = [];

        if ($this->width) $dimensions[] = $this->width . 'cm';
        if ($this->height) $dimensions[] = $this->height . 'cm';
        if ($this->length) $dimensions[] = $this->length . 'cm';

        return !empty($dimensions) ? implode(' x ', $dimensions) : null;
    }
}
