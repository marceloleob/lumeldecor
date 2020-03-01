<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('uf', 2);
			$table->string('name', 100);
        });

		// ADICIONA OS RELACIONAMENTOS
		// --
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		// REMOVE OS RELACIONAMENTOS
		// --

		// EXCLUI A TABELA
        Schema::dropIfExists('states');
    }
}
