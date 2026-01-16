<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->enum('type', ['percentage', 'fixed']); // % ou R$
            $table->decimal('value', 10, 2);
            $table->decimal('minimum_purchase', 10, 2)->nullable(); // compra mínima
            $table->integer('usage_limit')->nullable(); // null = ilimitado
            $table->integer('usage_count')->default(0);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['code', 'is_active']);
            $table->index(['starts_at', 'expires_at']); // para validação
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
