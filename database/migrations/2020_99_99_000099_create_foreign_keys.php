<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// ADICIONA OS RELACIONAMENTOS
		Schema::table('categories', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('cities', function (Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('customers', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('offer_promotions', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('no action')->onUpdate('no action');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action')->onUpdate('no action');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_colors', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('color_id')->references('id')->on('colors')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_infos', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_photos', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('product_themes', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('no action');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('suppliers', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action')->onUpdate('no action');
		});

		// ADICIONA OS RELACIONAMENTOS
		Schema::table('users', function (Blueprint $table) {
			$table->foreign('user_rule_id')->references('id')->on('user_rules')->onDelete('no action')->onUpdate('no action');
		});
    }

	public function down()
	{
		// REMOVE OS RELACIONAMENTOS
		Schema::table('categories', function (Blueprint $table) {
			$table->dropForeign('categories_material_id_foreign');
			$table->dropColumn('material_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('cities', function (Blueprint $table) {
			$table->dropForeign('cities_state_id_foreign');
			$table->dropColumn('state_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('customers', function (Blueprint $table) {
			$table->dropForeign('customers_user_id_foreign');
			$table->dropColumn('user_id');
			$table->dropForeign('customers_city_id_foreign');
			$table->dropColumn('city_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('offer_promotions', function (Blueprint $table) {
			$table->dropForeign('offer_promotions_material_id_foreign');
			$table->dropColumn('material_id');
			$table->dropForeign('offer_promotions_category_id_foreign');
			$table->dropColumn('category_id');
			$table->dropForeign('offer_promotions_theme_id_foreign');
			$table->dropColumn('theme_id');
			$table->dropForeign('offer_promotions_product_id_foreign');
			$table->dropColumn('product_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
			$table->dropColumn('category_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('product_colors', function (Blueprint $table) {
			$table->dropForeign('product_colors_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('product_colors_color_id_foreign');
			$table->dropColumn('color_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('product_infos', function (Blueprint $table) {
			$table->dropForeign('product_infos_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('products_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('product_photos', function (Blueprint $table) {
			$table->dropForeign('product_photos_product_id_foreign');
			$table->dropColumn('product_id');
		});


		// REMOVE OS RELACIONAMENTOS
		Schema::table('product_themes', function (Blueprint $table) {
			$table->dropForeign('product_themes_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('product_themes_theme_id_foreign');
			$table->dropColumn('theme_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('suppliers', function (Blueprint $table) {
			$table->dropForeign('suppliers_city_id_foreign');
			$table->dropColumn('city_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->dropForeign('supplier_contacts_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		// REMOVE OS RELACIONAMENTOS
		Schema::table('users', function (Blueprint $table) {
			$table->dropForeign('users_user_rule_id_foreign');
			$table->dropColumn('user_rule_id');
		});
    }
}
