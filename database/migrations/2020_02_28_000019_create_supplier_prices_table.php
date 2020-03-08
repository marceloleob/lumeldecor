<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('supplier_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('supplier_id')->unsigned();
			$table->bigInteger('product_info_id')->unsigned();
			$table->decimal('price', 7, 2);
			$table->timestamps();
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
        Schema::dropIfExists('supplier_prices');
    }
}
