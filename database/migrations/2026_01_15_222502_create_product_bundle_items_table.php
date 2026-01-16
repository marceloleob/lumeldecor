<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_bundle_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_bundle_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_item_id')->constrained()->onDelete('cascade'); // ← link direto com SKU
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->index('product_bundle_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_bundle_items');
    }
};
