<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_infos', function (Blueprint $table) {
			$table->id();
			$table->foreignId('product_id');
			$table->foreignId('color_id');
			$table->integer('amount');
			$table->string('image', 255);
			$table->boolean('launch')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('product_infos');
	}
}
