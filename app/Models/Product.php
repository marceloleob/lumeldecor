<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'material_id',
        'name',
        'slug',
        'description',
        'short_description',
        'meta_data',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'meta_data' => 'array',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
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

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->whereHas('items', function($q) {
            $q->where('stock_quantity', '>', 0);
        });
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getTotalStockAttribute(): int
    {
        return $this->items()->sum('stock_quantity');
    }

    public function getLowestPriceAttribute(): ?float
    {
        return $this->items()->min('price');
    }

    public function getHighestPriceAttribute(): ?float
    {
        return $this->items()->max('price');
    }

    public function getPriceRangeAttribute(): ?string
    {
        $min = $this->lowest_price;
        $max = $this->highest_price;

        if (!$min) {
            return null;
        }

        if ($min === $max) {
            return 'R$ ' . number_format($min, 2, ',', '.');
        }

        return 'R$ ' . number_format($min, 2, ',', '.') . ' - R$ ' . number_format($max, 2, ',', '.');
    }
}
