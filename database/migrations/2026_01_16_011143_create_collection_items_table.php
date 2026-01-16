<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('collection_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_item_id')->constrained()->onDelete('cascade');
            $table->boolean('is_highlighted')->default(false); // produto destaque da coleção
            $table->timestamps();

            $table->index(['collection_id']);
            $table->unique(['collection_id', 'product_item_id']); // não repete item na mesma coleção
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_items');
    }
};
