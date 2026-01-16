<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'coupon_id',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<', now());
    }

    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now())
            ->orWhereNull('expires_at');
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getSubtotalAttribute(): float
    {
        return $this->items->sum(function($item) {
            return $item->price * $item->quantity;
        });
    }

    public function getDiscountAttribute(): float
    {
        if (!$this->coupon || !$this->coupon->isValid()) {
            return 0;
        }

        if ($this->subtotal < ($this->coupon->minimum_purchase ?? 0)) {
            return 0;
        }

        if ($this->coupon->type === 'percentage') {
            return ($this->subtotal * $this->coupon->value) / 100;
        }

        return min($this->coupon->value, $this->subtotal);
    }

    public function getTotalAttribute(): float
    {
        return max(0, $this->subtotal - $this->discount);
    }

    public function getItemsCountAttribute(): int
    {
        return $this->items->sum('quantity');
    }

    public function getTotalWeightAttribute(): int
    {
        return $this->items->sum(function($item) {
            $weight = $item->cartable->productSize->weight ?? $item->cartable->product->weight ?? 0;
            return $weight * $item->quantity;
        });
    }

    // ========================================
    // METHODS
    // ========================================

    public function addItem($cartable, int $quantity = 1): CartItem
    {
        $item = $this->items()->firstOrNew([
            'cartable_type' => get_class($cartable),
            'cartable_id' => $cartable->id,
        ]);

        if ($item->exists) {
            $item->increment('quantity', $quantity);
        } else {
            $item->fill([
                'quantity' => $quantity,
                'price' => $cartable->price,
            ])->save();
        }

        return $item;
    }

    public function removeItem($cartable): void
    {
        $this->items()
            ->where('cartable_type', get_class($cartable))
            ->where('cartable_id', $cartable->id)
            ->delete();
    }

    public function updateQuantity($cartable, int $quantity): void
    {
        if ($quantity <= 0) {
            $this->removeItem($cartable);
            return;
        }

        $this->items()
            ->where('cartable_type', get_class($cartable))
            ->where('cartable_id', $cartable->id)
            ->update(['quantity' => $quantity]);
    }

    public function clear(): void
    {
        $this->items()->delete();
        $this->update(['coupon_id' => null]);
    }

    public function applyCoupon(Coupon $coupon): bool
    {
        if (!$coupon->isValid() || $this->subtotal < ($coupon->minimum_purchase ?? 0)) {
            return false;
        }

        $this->update(['coupon_id' => $coupon->id]);
        return true;
    }

    public function removeCoupon(): void
    {
        $this->update(['coupon_id' => null]);
    }
}
