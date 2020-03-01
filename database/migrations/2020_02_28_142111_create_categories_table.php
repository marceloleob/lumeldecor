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

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('categories', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('no action')->onUpdate('no action');
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
		Schema::table('categories', function (Blueprint $table) {
			$table->dropForeign('categories_material_id_foreign');
			$table->dropColumn('material_id');
		});

		// EXCLUI A TABELA
		Schema::dropIfExists('categories');
    }
}
