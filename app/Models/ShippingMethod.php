<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'type',
        'base_cost',
        'estimated_days',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'base_cost' => 'decimal:2',
    ];

    // ========================================
    // RELATIONSHIPS
    // ========================================

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // ========================================
    // SCOPES
    // ========================================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }

    // ========================================
    // ACCESSORS
    // ========================================

    public function getFormattedCostAttribute(): string
    {
        if ($this->base_cost == 0) {
            return 'Grátis';
        }

        return 'R$ ' . number_format($this->base_cost, 2, ',', '.');
    }

    public function getEstimatedDeliveryAttribute(): string
    {
        if (!$this->estimated_days) {
            return 'A calcular';
        }

        if ($this->estimated_days === 1) {
            return '1 dia útil';
        }

        return $this->estimated_days . ' dias úteis';
    }

    public function getIsCorreiosAttribute(): bool
    {
        return $this->type === 'correios';
    }

    public function getIsFixedAttribute(): bool
    {
        return $this->type === 'fixed';
    }

    public function getIsCustomAttribute(): bool
    {
        return $this->type === 'custom';
    }

    // ========================================
    // METHODS
    // ========================================

    public function calculateCost(array $params = []): float
    {
        // Se for correios, aqui você integraria com a API
        if ($this->is_correios) {
            // TODO: Integração com API dos Correios
            // return $this->calculateCorreiosCost($params);
            return $this->base_cost;
        }

        // Se for custom, você pode ter lógica personalizada
        if ($this->is_custom) {
            // TODO: Lógica personalizada de cálculo
            // Exemplo: por peso, distância, valor, etc.
            return $this->base_cost;
        }

        // Se for fixo, retorna o custo base
        return $this->base_cost;
    }
}
