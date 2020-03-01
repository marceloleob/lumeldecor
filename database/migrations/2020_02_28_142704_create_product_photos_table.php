<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('product_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('product_id')->unsigned();
			$table->string('name', 100);
			$table->string('extension', 5);
			$table->decimal('size', 7, 2);
			$table->enum('position', ['V', 'H']);
        });

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_photos', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
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
		Schema::table('product_photos', function (Blueprint $table) {
			$table->dropForeign('product_photos_product_id_foreign');
			$table->dropColumn('product_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('product_photos');
    }
}
