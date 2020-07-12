<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->foreignId('city_id');
			$table->string('address', 100);
			$table->string('number', 10)->nullable();
			$table->string('complement', 20)->nullable();
			$table->string('neighborhood', 100);
			$table->string('zipcode', 9);
			$table->boolean('delivery')->default(0);
			$table->boolean('billing')->default(0);
			$table->boolean('status')->default(1);
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
        Schema::dropIfExists('user_addresses');
    }
}
