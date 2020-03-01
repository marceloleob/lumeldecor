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

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action')->onUpdate('no action');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
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
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_supplier_id_foreign');
			$table->dropColumn('supplier_id');

			$table->dropForeign('products_category_id_foreign');
			$table->dropColumn('category_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('products');
    }
}
