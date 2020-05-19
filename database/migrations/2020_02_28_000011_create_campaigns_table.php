<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns', function (Blueprint $table) {
			$table->id();
			$table->string('name', 150);
			$table->smallInteger('start_day');
			$table->smallInteger('start_month');
			$table->smallInteger('finish_day');
			$table->smallInteger('finish_month');
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
		Schema::dropIfExists('campaigns');
	}
}
