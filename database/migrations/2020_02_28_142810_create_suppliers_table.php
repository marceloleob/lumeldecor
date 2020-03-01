<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('city_id')->unsigned();
			$table->string('code', 10);
			$table->enum('kind', ['F', 'J']);
			$table->string('document', 14)->unique();
			$table->string('company', 100);
			$table->string('phone', 20)->nullable(); // 0800
			$table->string('email', 100);
			$table->string('address', 100);
			$table->string('number', 10)->nullable();
			$table->string('comp', 20)->nullable();
			$table->string('neighborhood', 100);
			$table->string('zipcode', 8);
			$table->string('website', 100)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
