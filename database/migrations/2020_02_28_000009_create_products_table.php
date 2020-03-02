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
            $table->bigIncrements('id');
			$table->bigInteger('supplier_id')->unsigned();
			$table->bigInteger('category_id')->unsigned();
			$table->string('code', 10);
			$table->string('name', 100);
			$table->text('description');
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
