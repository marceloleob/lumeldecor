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
		Schema::table('campaigns', function (Blueprint $table) {
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action');
		});

		Schema::table('cities', function (Blueprint $table) {
			$table->foreign('state_id')->references('id')->on('states')->onDelete('no action');
		});

		Schema::table('items', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
			$table->foreign('product_size_id')->references('id')->on('product_sizes')->onDelete('restrict');
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action');
		});

		Schema::table('item_pictures', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action');
		});

		Schema::table('item_themes', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action');
		});

		Schema::table('item_tones', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action');
			$table->foreign('tone_id')->references('id')->on('tones')->onDelete('no action');
		});

		Schema::table('newsletters', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
		});

		Schema::table('offer_promotions', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('no action');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('no action');
			$table->foreign('theme_id')->references('id')->on('themes')->onDelete('no action');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('no action');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action');
		});

		Schema::table('products', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')->onDelete('restrict');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
		});

		Schema::table('product_sizes', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
		});

		Schema::table('stocks', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('restrict');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
			$table->foreign('reason_id')->references('id')->on('reasons')->onDelete('restrict');
		});

		Schema::table('suppliers', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
		});

		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('no action');
		});

		Schema::table('tones', function (Blueprint $table) {
			$table->foreign('color_id')->references('id')->on('colors')->onDelete('no action');
		});

		Schema::table('users', function (Blueprint $table) {
			$table->foreign('rule_id')->references('id')->on('rules')->onDelete('restrict');
		});

		Schema::table('user_addresses', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
		});

		Schema::table('user_contacts', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
		});
	}

	public function down()
	{
		Schema::table('campaigns', function (Blueprint $table) {
			$table->dropForeign('campaigns_theme_id_foreign');
			$table->dropColumn('theme_id');
		});

		Schema::table('cities', function (Blueprint $table) {
			$table->dropForeign('cities_state_id_foreign');
			$table->dropColumn('state_id');
		});

		Schema::table('items', function (Blueprint $table) {
			$table->dropForeign('items_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('items_product_size_id_foreign');
			$table->dropColumn('product_size_id');
			$table->dropForeign('items_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		Schema::table('item_pictures', function (Blueprint $table) {
			$table->dropForeign('item_pictures_item_id_foreign');
			$table->dropColumn('item_id');
		});

		Schema::table('item_themes', function (Blueprint $table) {
			$table->dropForeign('item_themes_item_id_foreign');
			$table->dropColumn('item_id');
			$table->dropForeign('item_themes_theme_id_foreign');
			$table->dropColumn('theme_id');
		});

		Schema::table('item_tones', function (Blueprint $table) {
			$table->dropForeign('item_tones_item_id_foreign');
			$table->dropColumn('item_id');
			$table->dropForeign('item_tones_tone_id_foreign');
			$table->dropColumn('tone_id');
		});

		Schema::table('newsletters', function (Blueprint $table) {
			$table->dropForeign('newsletters_user_id_foreign');
			$table->dropColumn('user_id');
		});

		Schema::table('offer_promotions', function (Blueprint $table) {
			$table->dropForeign('offer_promotions_material_id_foreign');
			$table->dropColumn('material_id');
			$table->dropForeign('offer_promotions_category_id_foreign');
			$table->dropColumn('category_id');
			$table->dropForeign('offer_promotions_theme_id_foreign');
			$table->dropColumn('theme_id');
			$table->dropForeign('offer_promotions_product_id_foreign');
			$table->dropColumn('product_id');
			$table->dropForeign('offer_promotions_item_id_foreign');
			$table->dropColumn('item_id');
		});

		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_material_id_foreign');
			$table->dropColumn('material_id');
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
			$table->dropForeign('stocks_reason_id_foreign');
			$table->dropColumn('reason_id');
		});

		Schema::table('suppliers', function (Blueprint $table) {
			$table->dropForeign('suppliers_city_id_foreign');
			$table->dropColumn('city_id');
		});

		Schema::table('supplier_contacts', function (Blueprint $table) {
			$table->dropForeign('supplier_contacts_supplier_id_foreign');
			$table->dropColumn('supplier_id');
		});

		Schema::table('tones', function (Blueprint $table) {
			$table->dropForeign('tones_color_id_foreign');
			$table->dropColumn('color_id');
		});

		Schema::table('users', function (Blueprint $table) {
			$table->dropForeign('users_rule_id_foreign');
			$table->dropColumn('rule_id');
		});

		Schema::table('user_addresses', function (Blueprint $table) {
			$table->dropForeign('user_addresses_user_id_foreign');
			$table->dropColumn('user_id');
			$table->dropForeign('user_addresses_city_id_foreign');
			$table->dropColumn('city_id');
		});

		Schema::table('user_contacts', function (Blueprint $table) {
			$table->dropForeign('user_contacts_user_id_foreign');
			$table->dropColumn('user_id');
		});
	}
}
