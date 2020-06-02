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
			$table->foreignId('product_size_id');
			$table->foreignId('supplier_id');
			$table->string('code', 50);             // LM + MATERIAL (99) + CATEGORIA (99) + PRODUTO (99999) + COR (999999) + TAMANHO (PP, 0P, 0M, 0G, GG, 0U)
			$table->string('picture');              // Foto do item
			$table->decimal('p_price', 8, 2);       // Preco no Fornecedor
			$table->decimal('s_price', 8, 2);       // Preco no Site
			$table->boolean('launch')->default(0);  // Lancamento
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
