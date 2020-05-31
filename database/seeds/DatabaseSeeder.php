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
			CustomerAddressesTableSeeder::class,
			EmployeesTableSeeder::class,
			SuppliersTableSeeder::class,
			SupplierContactsTableSeeder::class,

			ContactMessagesTableSeeder::class,

			ColorsTableSeeder::class,
			ThemesTableSeeder::class,
			CampaignsTableSeeder::class,

			MaterialsTableSeeder::class,
			CategoriesTableSeeder::class,

			ProductsTableSeeder::class,
			ProductSizesTableSeeder::class,
			ItemsTableSeeder::class,
			ItemThemesTableSeeder::class,
			ItemColorsTableSeeder::class,
			CampaignItemsTableSeeder::class,
			StocksTableSeeder::class,

			OfferCouponsTableSeeder::class,
			OfferPromotionsTableSeeder::class,
		]);
	}
}
