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
            $table->foreignId('category_id');
			$table->string('name', 150);
			$table->text('description');
			$table->text('hashtag')->nullable();
			$table->boolean('featured')->default(0);
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
		Schema::dropIfExists('product_infos');
	}
}
