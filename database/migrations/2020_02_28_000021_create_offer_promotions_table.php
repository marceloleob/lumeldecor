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
			$table->bigInteger('material_id')->nullable()->unsigned();
			$table->bigInteger('category_id')->nullable()->unsigned();
			$table->bigInteger('theme_id')->nullable()->unsigned();
			$table->bigInteger('product_id')->nullable()->unsigned();
			$table->string('name', 100);
			$table->enum('kind', ['V', 'P']);
			$table->decimal('amount', 7, 2);
			$table->smallInteger('start_day');
			$table->smallInteger('start_month');
			$table->smallInteger('finish_day');
			$table->smallInteger('finish_month');
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
