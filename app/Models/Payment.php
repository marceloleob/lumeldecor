<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'method',
        'status',
        'amount',
        'pix_qr_code',
        'pix_qr_code_base64',
        'pix_key',
        'boleto_url',
        'boleto_barcode',
        'boleto_due_date',
        'paid_at',
        'transaction_id',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'boleto_due_date' => 'date',
        'paid_at' => 'datetime',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'expired');
    }

    public function scopePix($query)
    {
        return $query->where('method', 'pix');
    }

    public function scopeBoleto($query)
    {
        return $query->where('method', 'boleto');
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getMethodLabelAttribute(): string
    {
        return match($this->method) {
            'pix' => 'PIX',
            'boleto' => 'Boleto Bancário',
            default => $this->method,
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Aguardando Pagamento',
            'paid' => 'Pago',
            'failed' => 'Falhou',
            'expired' => 'Expirado',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'paid' => 'success',
            'failed' => 'danger',
            'expired' => 'secondary',
            default => 'secondary',
        };
    }

    public function getIsPixAttribute(): bool
    {
        return $this->method === 'pix';
    }

    public function getIsBoletoAttribute(): bool
    {
        return $this->method === 'boleto';
    }

    public function getIsPendingAttribute(): bool
    {
        return $this->status === 'pending';
    }

    public function getIsPaidAttribute(): bool
    {
        return $this->status === 'paid';
    }

    public function getIsExpiredAttribute(): bool
    {
        if ($this->status === 'expired') {
            return true;
        }

        if ($this->is_boleto && $this->boleto_due_date) {
            return $this->boleto_due_date->isPast();
        }

        return false;
    }

    // ========================================
    // METHODS
    // ========================================

    public function markAsPaid(?string $transactionId = null): void
    {
        $this->update([
            'status' => 'paid',
            'paid_at' => now(),
            'transaction_id' => $transactionId,
        ]);

        $this->order->markAsPaid();
    }

    public function markAsFailed(): void
    {
        $this->update(['status' => 'failed']);
    }

    public function markAsExpired(): void
    {
        $this->update(['status' => 'expired']);
    }
}
