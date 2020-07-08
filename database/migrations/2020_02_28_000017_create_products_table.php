<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
            $table->foreignId('material_id');
            $table->foreignId('category_id');
			$table->string('name', 150);
			$table->string('slug', 200)->unique();
			$table->string('picture', 100)->nullable();
			$table->text('description');
			$table->text('hashtag')->nullable();
			$table->boolean('national')->default(1);
			$table->boolean('featured')->default(0);
			$table->boolean('done')->default(0);
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
		Schema::dropIfExists('products');
	}
}
