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
			$table->foreignId('reason_id');
			$table->string('action', 100);
			$table->smallInteger('incoming')->nullable();
			$table->smallInteger('overdraw')->nullable();
			$table->smallInteger('balance');
			$table->boolean('current')->default(1);
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
