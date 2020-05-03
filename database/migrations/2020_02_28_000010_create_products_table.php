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
		// CRIA A TABELA
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('category_id')->unsigned();
			$table->string('code', 20);
			$table->char('size', 3);
			$table->decimal('weight', 4, 2)->nullable();
			$table->decimal('height', 4, 2)->nullable();
			$table->decimal('width', 4, 2)->nullable();
			$table->decimal('length', 4, 2)->nullable();
			$table->integer('amount');
			$table->decimal('price_site', 7, 2);
			$table->decimal('price_supp', 7, 2);
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
		// EXCLUI A TABELA
        Schema::dropIfExists('products');
    }
}
