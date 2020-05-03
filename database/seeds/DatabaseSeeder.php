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

			UserRulesTableSeeder::class,
			UsersTableSeeder::class,
			CustomersTableSeeder::class,
			ReceivedEmailsTableSeeder::class,

			MaterialsTableSeeder::class,
			CategoriesTableSeeder::class,
			ColorsTableSeeder::class,
			ThemesTableSeeder::class,

			ProductsTableSeeder::class,
			ProductColorsTableSeeder::class,
			ProductInfosTableSeeder::class,
			ProductPhotosTableSeeder::class,
			ProductThemesTableSeeder::class,

			SuppliersTableSeeder::class,
			SupplierContactsTableSeeder::class,

			OfferCouponsTableSeeder::class,
			OfferPromotionsTableSeeder::class,
		]);
	}
}
