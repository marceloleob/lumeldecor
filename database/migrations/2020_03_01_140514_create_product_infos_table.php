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
			$table->bigIncrements('id');
			$table->bigInteger('product_id')->unsigned();
			$table->bigInteger('color_id')->unsigned();
			$table->integer('amount');
			$table->char('size', 3);
			$table->decimal('weight', 4, 2)->nullable();
			$table->decimal('height', 4, 2)->nullable();
			$table->decimal('width', 4, 2)->nullable();
			$table->decimal('length', 4, 2)->nullable();
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
