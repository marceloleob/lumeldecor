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
			$table->bigIncrements('id');
			$table->bigInteger('material_id')->unsigned()->nullable();
			$table->bigInteger('category_id')->unsigned()->nullable();
			$table->bigInteger('theme_id')->unsigned()->nullable();
			$table->bigInteger('product_id')->unsigned()->nullable();
			$table->enum('kind', ['V', 'P']);
			$table->decimal('value', 7, 2);
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
