<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover_image',
        'meta_title',
        'meta_description',
        'starts_at',
        'ends_at',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function productItems(): BelongsToMany
    {
        return $this->belongsToMany(ProductItem::class, 'collection_items')
            ->withPivot('is_highlighted');
    }

    public function items(): HasMany
    {
        return $this->hasMany(CollectionItem::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CollectionImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(CollectionImage::class)->where('is_primary', true);
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

    public function scopeInPeriod($query)
    {
        return $query->where(function($q) {
            $q->whereNull('starts_at')
              ->orWhere('starts_at', '<=', now());
        })->where(function($q) {
            $q->whereNull('ends_at')
              ->orWhere('ends_at', '>=', now());
        });
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getTotalPriceAttribute(): float
    {
        return $this->productItems->sum('price');
    }

    public function getHighlightedItemAttribute()
    {
        return $this->productItems()
            ->wherePivot('is_highlighted', true)
            ->first();
    }

    // ========================================
    // METHODS
    // ========================================

    public function isInPeriod(): bool
    {
        if (!$this->starts_at && !$this->ends_at) {
            return true;
        }

        $now = now();

        if ($this->starts_at && $now->lt($this->starts_at)) {
            return false;
        }

        if ($this->ends_at && $now->gt($this->ends_at)) {
            return false;
        }

        return true;
    }
}
