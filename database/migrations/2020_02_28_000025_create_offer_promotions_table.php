<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferPromotionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_promotions', function (Blueprint $table) {
			$table->id();
			$table->foreignId('material_id')->nullable();
			$table->foreignId('category_id')->nullable();
			$table->foreignId('theme_id')->nullable();
			$table->foreignId('item_id')->nullable();
			$table->foreignId('product_id')->nullable();
			$table->string('name', 150)->unique();
			$table->enum('kind', ['V', 'P']);
			$table->decimal('amount', 7, 2);
			$table->date('start_date');
			$table->date('finish_date');
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
		Schema::dropIfExists('offer_promotions');
	}
}
