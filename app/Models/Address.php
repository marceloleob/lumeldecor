<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'phone',
        'zip_code',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getFullAddressAttribute(): string
    {
        $parts = [
            $this->street . ', ' . $this->number,
            $this->complement,
            $this->neighborhood,
            $this->city . ' - ' . $this->state,
            'CEP: ' . $this->zip_code,
        ];

        return implode(', ', array_filter($parts));
    }

    public function getFormattedZipCodeAttribute(): string
    {
        return preg_replace('/^(\d{5})(\d{3})$/', '$1-$2', $this->zip_code);
    }

    public function getFormattedPhoneAttribute(): string
    {
        $phone = preg_replace('/\D/', '', $this->phone);

        if (strlen($phone) === 11) {
            return preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $phone);
        }

        if (strlen($phone) === 10) {
            return preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '($1) $2-$3', $phone);
        }

        return $this->phone;
    }

    // ========================================
    // EVENTS
    // ========================================

    protected static function booted()
    {
        // Quando marca como padrão, desmarca os outros
        static::saving(function ($address) {
            if ($address->is_default) {
                static::where('user_id', $address->user_id)
                    ->where('id', '!=', $address->id)
                    ->update(['is_default' => false]);
            }
        });
    }
}
