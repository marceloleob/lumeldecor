<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('material_id')->unsigned();
			$table->string('name', 100);
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
		Schema::dropIfExists('categories');
    }
}