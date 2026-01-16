<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Inventory extends Model
{
    protected $fillable = [
        'inventoriable_type',
        'inventoriable_id',
        'quantity',
        'type',
        'reason',
        'notes',
        'user_id',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function inventoriable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopeIn($query)
    {
        return $query->where('type', 'in');
    }

    public function scopeOut($query)
    {
        return $query->where('type', 'out');
    }

    public function scopeAdjustment($query)
    {
        return $query->where('type', 'adjustment');
    }

    public function scopeRecent($query, int $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getFormattedTypeAttribute(): string
    {
        return match($this->type) {
            'in' => 'Entrada',
            'out' => 'Saída',
            'adjustment' => 'Ajuste',
            default => $this->type,
        };
    }

    public function getIsPositiveAttribute(): bool
    {
        return $this->quantity > 0;
    }
}
