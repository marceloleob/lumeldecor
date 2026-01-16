<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollectionImage extends Model
{
    protected $fillable = [
        'collection_id',
        'path',
        'alt_text',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
