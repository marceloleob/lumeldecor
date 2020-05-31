<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
			$table->char('size', 3);                        // Tamanho           (PP. P, M, G, GG, Unico)
			$table->char('shape', 3);                       // Forma do produto  ('Q' => 'Quadrado', 'R' => 'Redondo')
			$table->decimal('weight', 5, 3);                // Peso (kg)         12345,123
			$table->decimal('pro_length', 5, 2);            // Product - Comprimento (cm)  12345,12
			$table->decimal('pro_width', 5, 2)->nullable(); // Product - Largura (cm)      12345,12
			$table->decimal('pro_height', 5, 2);            // Product - Altura (cm)       12345,12
			$table->decimal('shi_length', 5, 2);            // Shipping - Comprimento (cm)  12345,12
			$table->decimal('shi_width', 5, 2);             // Shipping - Largura (cm)      12345,12
			$table->decimal('shi_height', 5, 2);            // Shipping - Altura (cm)       12345,12
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
}
