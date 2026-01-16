<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductBundleItem extends Model
{
    protected $fillable = [
        'bundle_id',
        'product_item_id',
        'quantity',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function bundle(): BelongsTo
    {
        return $this->belongsTo(ProductBundle::class, 'bundle_id');
    }

    public function productItem(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class);
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getSubtotalAttribute(): float
    {
        return $this->productItem->price * $this->quantity;
    }

    public function getAvailableStockAttribute(): int
    {
        return floor($this->productItem->stock_quantity / $this->quantity);
    }
}
