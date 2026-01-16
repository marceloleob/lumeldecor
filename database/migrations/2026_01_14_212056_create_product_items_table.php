<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_size_id')->constrained()->onDelete('cascade');
            $table->string('sku')->unique();
            $table->string('color');              // "Branca", "Preta", "Laranja", "Dourada"
            $table->string('finish')->nullable(); // "Fosca", "Brilhante", "Texturizada" (opcional)
            $table->decimal('price', 10, 2);
            $table->decimal('compare_price', 10, 2)->nullable();
            $table->decimal('supplier_price', 10, 2)->nullable();

            // Estoque INDIVIDUAL
            $table->integer('stock_quantity')->default(0);
            $table->integer('min_stock')->default(0);

            // Controles
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_launch')->default(false);

            $table->timestamps();

            // Índices otimizados
            $table->index(['product_id', 'is_active']);
            $table->index(['product_size_id', 'color', 'is_active']);
            $table->index(['sku', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
