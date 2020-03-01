<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned()->nullable();
			$table->bigInteger('city_id')->unsigned();
			$table->string('document', 11)->unique();
			$table->string('telephone', 14)->nullable();
			$table->string('cellphone', 15);
			$table->string('address', 100);
			$table->string('number', 10)->nullable();
			$table->string('comp', 20)->nullable();
			$table->string('neighborhood', 100);
			$table->string('zipcode', 8);
			$table->boolean('status')->default(0);
			$table->timestamps();
        });

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('customers', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action')->onUpdate('no action');
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
		Schema::table('customers', function (Blueprint $table) {
			$table->dropForeign('customers_user_id_foreign');
			$table->dropColumn('user_id');

			$table->dropForeign('customers_city_id_foreign');
			$table->dropColumn('city_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('customers');
    }
}
