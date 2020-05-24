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
			$table->string('code', 50);             // MATERIAL (99) + CATEGORIA (99) + PRODUTO (99999) + COR (99) + TAMANHO (P,M,G)
			$table->string('slug', 250)->unique();  // "categoria"-"produto"-de-"material"-"tamanho"
			$table->char('size', 5);                // Tamanho (P, M, G, Unico)
			$table->decimal('weight', 5, 2);        // Peso (kg)
			$table->decimal('height', 5, 2);        // Altura (cm)
			$table->decimal('width', 5, 2);         // Largura (cm)
			$table->decimal('length', 5, 2);        // Comprimento (cm)
			$table->double('price', 10, 2);         // Preco no Site
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
