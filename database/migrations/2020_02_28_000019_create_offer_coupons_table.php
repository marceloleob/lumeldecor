<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferCouponsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_coupons', function (Blueprint $table) {
			$table->id();
			$table->string('name', 100);
			$table->string('code', 50)->unique();
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
		Schema::dropIfExists('offer_coupons');
	}
}
