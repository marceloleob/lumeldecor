<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('state_id')->unsigned();
			$table->string('name', 100);
			$table->boolean('capital')->default(0);
        });

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('cities', function (Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')->onDelete('no action')->onUpdate('no action');
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
		Schema::table('cities', function (Blueprint $table) {
			$table->dropForeign('cities_state_id_foreign');
			$table->dropColumn('state_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('cities');
    }
}
