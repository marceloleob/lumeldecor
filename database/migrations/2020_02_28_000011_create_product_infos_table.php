<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('product_infos', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('product_id')->unsigned();
			$table->bigInteger('supplier_id')->unsigned();
			$table->string('name', 300);
			$table->text('hashtag');
			$table->text('description');

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
        Schema::dropIfExists('product_infos');
    }
}
