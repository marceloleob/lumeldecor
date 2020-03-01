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
			$table->bigIncrements('id');
			$table->bigInteger('product_id')->unsigned();
			$table->bigInteger('color_id')->unsigned();
			$table->integer('amount');
			$table->char('size', 3);
			$table->decimal('weight', 4, 2)->nullable();
			$table->decimal('height', 4, 2)->nullable();
			$table->decimal('width', 4, 2)->nullable();
			$table->decimal('length', 4, 2)->nullable();
        });

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_infos', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('color_id')->references('id')->on('colors')->onDelete('no action')->onUpdate('no action');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		// REMOVE OS RELACIONAMENTOS
		Schema::table('product_infos', function (Blueprint $table) {
			$table->dropForeign('product_infos_product_id_foreign');
			$table->dropColumn('product_id');

			$table->dropForeign('product_infos_color_id_foreign');
			$table->dropColumn('color_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('product_infos');
    }
}
