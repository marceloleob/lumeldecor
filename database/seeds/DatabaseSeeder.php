<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([
			StatesTableSeeder::class,
			CitiesTableSeeder::class,

			RulesTableSeeder::class,
			UsersTableSeeder::class,
			UserContactsTableSeeder::class,
			UserAddressesTableSeeder::class,
			SuppliersTableSeeder::class,
			SupplierContactsTableSeeder::class,

			MessagesTableSeeder::class,
			NewslettersTableSeeder::class,

			CampaignsTableSeeder::class,
			ColorsTableSeeder::class,
			TonesTableSeeder::class,
			ThemesTableSeeder::class,

			MaterialsTableSeeder::class,
			CategoriesTableSeeder::class,

			ProductsTableSeeder::class,
			ProductSizesTableSeeder::class,
			ItemsTableSeeder::class,
			ItemTonesTableSeeder::class,
			ItemThemesTableSeeder::class,
			ItemPicturesTableSeeder::class,

			ReasonsTableSeeder::class,
			StocksTableSeeder::class,

			OfferCouponsTableSeeder::class,
			OfferPromotionsTableSeeder::class,
		]);
	}
}
