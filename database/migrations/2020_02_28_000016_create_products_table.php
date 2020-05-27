<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
            $table->foreignId('product_info_id');
			$table->string('slug', 250)->unique();  // "boleira"-"lisa-neon"-de-"ceramica"
			$table->char('size', 5);                // Tamanho (P, M, G, Unico)
			$table->decimal('weight', 5, 2);        // Peso (kg)
			$table->decimal('height', 5, 2);        // Altura (cm)
			$table->decimal('width', 5, 2);         // Largura (cm)
			$table->decimal('length', 5, 2);        // Comprimento (cm)
			$table->boolean('status')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}
}
