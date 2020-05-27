<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function (Blueprint $table) {
			$table->id();
			$table->foreignId('product_id');
			$table->foreignId('supplier_id');
			$table->foreignId('color_id');
			$table->string('code', 50);             // MATERIAL (99) + CATEGORIA (99) + PRODUTO (99999) + COR (99) + TAMANHO (P,M,G)
			$table->string('image', 255);           // Foto do item
			$table->double('p_price', 10, 2);       // Preco no Fornecedor
			$table->double('s_price', 10, 2);       // Preco no Site
			$table->boolean('launch')->default(0);  // Mostrar como lancamento?
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
		Schema::dropIfExists('items');
	}
}
