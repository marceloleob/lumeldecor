<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('product_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('product_info_id')->unsigned();
			$table->decimal('price', 7, 2);
			$table->timestamps();
        });

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_prices', function (Blueprint $table) {
			$table->foreign('product_info_id')->references('id')->on('product_infos')->onDelete('no action')->onUpdate('no action');
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
		Schema::table('product_prices', function (Blueprint $table) {
			$table->dropForeign('product_prices_product_info_id_foreign');
			$table->dropColumn('product_info_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('product_prices');
    }
}
