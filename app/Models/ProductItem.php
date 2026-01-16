<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductItem extends Model
{
    protected $fillable = [
        'product_id',
        'product_size_id',
        'sku',
        'color',
        'finish',
        'price',
        'compare_price',
        'supplier_price',
        'stock_quantity',
        'min_stock',
        'is_active',
        'is_featured',
        'is_launch',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_launch' => 'boolean',
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'supplier_price' => 'decimal:2',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productSize(): BelongsTo
    {
        return $this->belongsTo(ProductSize::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductItemImage::class)->orderBy('order');
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductItemImage::class)->where('is_primary', true);
    }

    public function inventoryMovements(): MorphMany
    {
        return $this->morphMany(Inventory::class, 'inventoriable');
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_items')
            ->withPivot('order', 'is_highlighted')
            ->where('is_active', true);
    }

    public function bundles(): BelongsToMany
    {
        return $this->belongsToMany(ProductBundle::class, 'product_bundle_items')
            ->withPivot('quantity');
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

    public function scopeLaunch($query)
    {
        return $query->where('is_launch', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock_quantity', '<=', 'min_stock');
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getFullNameAttribute(): string
    {
        $parts = [
            $this->product->name,
            $this->productSize->size,
            $this->color,
        ];

        if ($this->finish) {
            $parts[] = $this->finish;
        }

        return implode(' - ', array_filter($parts));
    }

    public function getHasDiscountAttribute(): bool
    {
        return $this->compare_price && $this->compare_price > $this->price;
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        if (!$this->has_discount) {
            return null;
        }

        return round((($this->compare_price - $this->price) / $this->compare_price) * 100);
    }

    public function getIsLowStockAttribute(): bool
    {
        return $this->stock_quantity <= $this->min_stock;
    }

    // ========================================
    // METHODS
    // ========================================

    public function addStock(int $quantity, ?string $reason = null, ?int $userId = null): void
    {
        $this->increment('stock_quantity', $quantity);

        $this->inventoryMovements()->create([
            'quantity' => $quantity,
            'type' => 'in',
            'reason' => $reason,
            'user_id' => $userId,
        ]);
    }

    public function removeStock(int $quantity, ?string $reason = null, ?int $userId = null): void
    {
        $this->decrement('stock_quantity', $quantity);

        $this->inventoryMovements()->create([
            'quantity' => -$quantity,
            'type' => 'out',
            'reason' => $reason,
            'user_id' => $userId,
        ]);
    }

    public function adjustStock(int $newQuantity, ?string $reason = null, ?int $userId = null): void
    {
        $difference = $newQuantity - $this->stock_quantity;

        $this->update(['stock_quantity' => $newQuantity]);

        $this->inventoryMovements()->create([
            'quantity' => $difference,
            'type' => 'adjustment',
            'reason' => $reason,
            'user_id' => $userId,
        ]);
    }
}
