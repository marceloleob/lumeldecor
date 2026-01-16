<?php

namespace App\Models;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_number',
        'user_id',
        'address_id',
        'coupon_id',
        'shipping_method_id',
        'subtotal',
        'discount',
        'shipping_cost',
        'total',
        'status',
        'tracking_code',
        'customer_notes',
        'admin_notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function shippingMethod(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
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

    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    public function scopeShipped($query)
    {
        return $query->where('status', 'shipped');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeRecent($query, int $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Aguardando Pagamento',
            'paid' => 'Pago',
            'processing' => 'Em Separação',
            'shipped' => 'Enviado',
            'delivered' => 'Entregue',
            'cancelled' => 'Cancelado',
            'refunded' => 'Reembolsado',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'paid' => 'info',
            'processing' => 'primary',
            'shipped' => 'success',
            'delivered' => 'success',
            'cancelled' => 'danger',
            'refunded' => 'secondary',
            default => 'secondary',
        };
    }

    public function getIsPendingAttribute(): bool
    {
        return $this->status === 'pending';
    }

    public function getIsPaidAttribute(): bool
    {
        return in_array($this->status, ['paid', 'processing', 'shipped', 'delivered']);
    }

    public function getCanBeCancelledAttribute(): bool
    {
        return in_array($this->status, ['pending', 'paid', 'processing']);
    }

    public function getCanBeRefundedAttribute(): bool
    {
        return in_array($this->status, ['paid', 'processing', 'shipped']);
    }

    public function getItemsCountAttribute(): int
    {
        return $this->items->sum('quantity');
    }

    // ========================================
    // METHODS
    // ========================================

    public static function generateOrderNumber(): string
    {
        $prefix = 'LUM';
        $year = now()->year;
        $count = static::whereYear('created_at', $year)->count() + 1;

        return sprintf('%s-%d-%05d', $prefix, $year, $count);
    }

    public function updateStatus(string $status, ?string $adminNotes = null): void
    {
        $this->update([
            'status' => $status,
            'admin_notes' => $adminNotes ?? $this->admin_notes,
        ]);

        // TODO: Enviar email de notificação para o cliente
        // event(new OrderStatusChanged($this, $status));
    }

    public function cancel(?string $reason = null): void
    {
        if (!$this->can_be_cancelled) {
            throw new \Exception('Este pedido não pode ser cancelado.');
        }

        $this->updateStatus('cancelled', $reason);

        // Devolver estoque
        foreach ($this->items as $item) {
            $item->orderable->addStock(
                $item->quantity,
                "Devolução - Pedido #{$this->order_number} cancelado",
                Auth::id()
            );
        }

        // Devolver uso do cupom
        if ($this->coupon) {
            $this->coupon->decrementUsage();
        }
    }

    public function markAsPaid(): void
    {
        $this->updateStatus('paid');

        // Incrementar uso do cupom
        if ($this->coupon) {
            $this->coupon->incrementUsage();
        }
    }

    public function markAsShipped(string $trackingCode): void
    {
        $this->update([
            'status' => 'shipped',
            'tracking_code' => $trackingCode,
        ]);
    }

    public function markAsDelivered(): void
    {
        $this->updateStatus('delivered');
    }
}
