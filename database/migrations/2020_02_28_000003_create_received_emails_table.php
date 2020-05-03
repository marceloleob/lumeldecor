<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('received_emails', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone', 15);
			$table->string('subject', 100);
			$table->text('text');
			$table->boolean('read')->default(0);
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
		// EXCLUI A TABELA
        Schema::dropIfExists('received_emails');
    }
}
