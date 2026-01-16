<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductItemImage extends Model
{
    protected $fillable = [
        'product_item_id',
        'path',
        'alt_text',
        'order',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function productItem(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class);
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
