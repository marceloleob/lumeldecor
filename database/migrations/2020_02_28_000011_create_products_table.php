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
			$table->foreignId('item_id');
			$table->foreignId('supplier_id');
			$table->string('code', 50);           // MATERIAL (99) + CATEGORIA (99) + PRODUTO (99999) + COR (99) + TAMANHO (P,M,G)
			$table->char('size', 5);              // Tamanho (P, M, G, Unico)
			$table->decimal('weight', 4, 2);      // Peso (kg)
			$table->smallInteger('height');       // Altura (cm)
			$table->smallInteger('width');        // Largura (cm)
			$table->smallInteger('length');       // Comprimento (cm)
			$table->double('price', 10, 2);       // Preco no Site
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
