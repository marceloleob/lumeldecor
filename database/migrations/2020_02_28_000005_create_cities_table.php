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
            $table->id();
			$table->bigInteger('state_id')->unsigned();
			$table->string('name', 100);
			$table->boolean('capital')->default(0);
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
        Schema::dropIfExists('cities');
    }
}
