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
			$table->foreignId('product_size_id');
			$table->foreignId('supplier_id');
			$table->string('sku', 50);
			$table->string('slug', 200)->unique();
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
