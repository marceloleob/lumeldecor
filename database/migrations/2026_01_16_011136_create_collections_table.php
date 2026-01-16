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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // "Dia dos Namorados 2025"
            $table->string('slug')->unique();          // "dia-dos-namorados-2025"
            $table->text('description')->nullable();   // Descrição do tema
            $table->string('cover_image')->nullable(); // Foto da cena montada (Arraiá completo)

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Datas (opcional, mas útil)
            $table->date('starts_at')->nullable();     // 01/06 (Festa Junina)
            $table->date('ends_at')->nullable();       // 30/06

            // Controles
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false); // destaque na home

            $table->timestamps();
            $table->softDeletes();

            $table->index(['slug', 'is_active', 'is_featured']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
