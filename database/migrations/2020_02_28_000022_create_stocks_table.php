<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
			$table->foreignId('product_id');
			$table->foreignId('item_id');
			$table->foreignId('user_id');
			$table->string('action', 50);
			$table->double('incoming', 10, 2)->nullable();
			$table->double('outcoming', 10, 2)->nullable();
			$table->smallInteger('balance');
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
        Schema::dropIfExists('stocks');
    }
}
