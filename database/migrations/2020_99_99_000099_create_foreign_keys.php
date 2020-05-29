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
		Schema::table('campaign_items', function (Blueprint $table) {
			$table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action')->onUpdate('no action');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('categories', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('cities', function (Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('customers', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('no action');
		});

		Schema::table('customer_addresses', function (Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('employees', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('no action');
		});

		Schema::table('items', function (Blueprint $table) {
			$table->foreign('product_size_id')->references('id')->on('product_sizes')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict')->onUpdate('restrict');
		});

		Schema::table('item_colors', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('color_id')->references('id')->on('colors')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('item_themes', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('restrict')->onUpdate('restrict');
		});

		Schema::table('offer_promotions', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('no action')->onUpdate('no action');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action')->onUpdate('no action');
			$table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('no action')->onUpdate('no action');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('products', function (Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
		});

		Schema::table('product_sizes', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
		});

		Schema::table('stocks', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
		});

		Schema::table('suppliers', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action')->onUpdate('no action');
		});

		Schema::table('users', function (Blueprint $table) {
			$table->foreign('user_rule_id')->references('id')->on('user_rules')->onDelete('restrict')->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('campaign_items', function (Blueprint $table) {
			$table->dropForeign('campaign_items_campaign_id_foreign');
			$table->dropColumn('campaign_id');
			$table->dropForeign('campaign_items_theme_id_foreign');
			$table->dropColumn('theme_id');
			$table->dropForeign('campaign_items_item_id_foreign');
			$table->dropColumn('item_id');
		});

		Schema::table('categories', function (Blueprint $table) {
			$table->dropForeign('categories_material_id_foreign');
			$table->dropColumn('material_id');
		});

		Schema::table('cities', function (Blueprint $table) {
			$table->dropForeign('cities_state_id_foreign');
			$table->dropColumn('state_id');
		});

		Schema::table('customers', function (Blueprint $table) {
			$table->dropForeign('customers_user_id_foreign');
			$table->dropColumn('user_id');
		});

		Schema::table('customer_addresses', function (Blueprint $table) {
			$table->dropForeign('customer_addresses_customer_id_foreign');
			$table->dropColumn('customer_id');
			$table->dropForeign('customer_addresses_city_id_foreign');
			$table->dropColumn('city_id');
		});

		Schema::table('employees', function (Blueprint $table) {
			$table->dropForeign('employees_user_id_foreign');
			$table->dropColumn('user_id');
		});

		Schema::table('items', function (Blueprint $table) {
			$table->dropForeign('items_product_size_id_foreign');
			$table->dropColumn('product_size_id');
			$table->dropForeign('items_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		Schema::table('item_colors', function (Blueprint $table) {
			$table->dropForeign('item_colors_item_id_foreign');
			$table->dropColumn('item_id');
			$table->dropForeign('item_colors_color_id_foreign');
			$table->dropColumn('color_id');
		});

		Schema::table('item_themes', function (Blueprint $table) {
			$table->dropForeign('item_themes_item_id_foreign');
			$table->dropColumn('item_id');
			$table->dropForeign('item_themes_theme_id_foreign');
			$table->dropColumn('theme_id');
		});

		Schema::table('offer_promotions', function (Blueprint $table) {
			$table->dropForeign('offer_promotions_material_id_foreign');
			$table->dropColumn('material_id');
			$table->dropForeign('offer_promotions_category_id_foreign');
			$table->dropColumn('category_id');
			$table->dropForeign('offer_promotions_theme_id_foreign');
			$table->dropColumn('theme_id');
			$table->dropForeign('offer_promotions_campaign_id_foreign');
			$table->dropColumn('campaign_id');
			$table->dropForeign('offer_promotions_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('offer_promotions_item_id_foreign');
			$table->dropColumn('item_id');
		});

		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
			$table->dropColumn('category_id');
		});

		Schema::table('product_sizes', function (Blueprint $table) {
			$table->dropForeign('product_sizes_product_id_foreign');
			$table->dropColumn('product_id');
		});

		Schema::table('stocks', function (Blueprint $table) {
			$table->dropForeign('stocks_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('stocks_item_id_foreign');
			$table->dropColumn('item_id');
			$table->dropForeign('stocks_user_id_foreign');
			$table->dropColumn('user_id');
		});

		Schema::table('suppliers', function (Blueprint $table) {
			$table->dropForeign('suppliers_city_id_foreign');
			$table->dropColumn('city_id');
		});

		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->dropForeign('supplier_contacts_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		Schema::table('users', function (Blueprint $table) {
			$table->dropForeign('users_user_rule_id_foreign');
			$table->dropColumn('user_rule_id');
		});
	}
}
