<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductBundle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'compare_price',
        'track_inventory',
        'stock_quantity',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'track_inventory' => 'boolean',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function productItems(): BelongsToMany
    {
        return $this->belongsToMany(ProductItem::class, 'product_bundle_items')
            ->withPivot('quantity')
            ->orderBy('product_bundle_items.order');
    }

    public function bundleItems(): HasMany
    {
        return $this->hasMany(ProductBundleItem::class, 'product_bundle_id');
    }

    public function inventoryMovements(): MorphMany
    {
        return $this->morphMany(Inventory::class, 'inventoriable');
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getTotalPriceAttribute(): float
    {
        return $this->productItems->sum(function($item) {
            return $item->price * $item->pivot->quantity;
        });
    }

    public function getSavingsAttribute(): float
    {
        return max(0, $this->total_price - $this->price);
    }

    public function getSavingsPercentageAttribute(): int
    {
        if ($this->total_price == 0) {
            return 0;
        }

        return round(($this->savings / $this->total_price) * 100);
    }

    // ========================================
    // METHODS
    // ========================================

    public function hasStock(int $quantity = 1): bool
    {
        if (!$this->track_inventory) {
            return $this->stock_quantity >= $quantity;
        }

        foreach ($this->bundleItems as $bundleItem) {
            $requiredStock = $bundleItem->quantity * $quantity;

            if ($bundleItem->productItem->stock_quantity < $requiredStock) {
                return false;
            }
        }

        return true;
    }

    public function getAvailableStock(): int
    {
        if (!$this->track_inventory) {
            return $this->stock_quantity;
        }

        $maxQuantity = PHP_INT_MAX;

        foreach ($this->bundleItems as $bundleItem) {
            $itemMaxQuantity = floor($bundleItem->productItem->stock_quantity / $bundleItem->quantity);
            $maxQuantity = min($maxQuantity, $itemMaxQuantity);
        }

        return $maxQuantity;
    }
}
