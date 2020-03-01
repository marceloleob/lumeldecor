<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// CRIA A TABELA
        Schema::create('supplier_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('supplier_id')->unsigned();
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('telephone', 14)->nullable();
			$table->string('cellphone', 15);
			$table->string('position', 100);
        });

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action')->onUpdate('no action');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		// REMOVE OS RELACIONAMENTOS
		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->dropForeign('supplier_contacts_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		// EXCLUI A TABELA
        Schema::dropIfExists('supplier_contacts');
    }
}
