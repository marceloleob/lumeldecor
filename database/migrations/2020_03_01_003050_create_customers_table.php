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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
