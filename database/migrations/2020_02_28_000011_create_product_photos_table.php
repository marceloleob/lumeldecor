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
			$table->bigInteger('product_info_id')->unsigned();
			$table->bigInteger('color_id')->unsigned();
			$table->string('name', 100);
			$table->string('extension', 5);
			$table->decimal('size', 7, 2);
			$table->enum('position', ['V', 'H']);
			$table->integer('amount');
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
        Schema::dropIfExists('product_photos');
    }
}
