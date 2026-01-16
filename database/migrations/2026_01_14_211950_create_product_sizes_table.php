<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('size');                 // "P", "M", "G", "35cm", "80x60cm"
            $table->string('shape')->nullable();    // "Redonda", "Quadrada", "Retangular"
            $table->integer('weight')->nullable();  // gramas
            $table->integer('width')->nullable();   // cm
            $table->integer('height')->nullable();  // cm
            $table->integer('length')->nullable();  // cm
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['product_id', 'size']); // não pode repetir tamanho
            $table->index(['product_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
    }
};
