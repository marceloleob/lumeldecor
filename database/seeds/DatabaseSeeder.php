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
			SuppliersTableSeeder::class,
			// EmployeesTableSeeder::class,

			CustomerAddressesTableSeeder::class,
			SupplierContactsTableSeeder::class,

			ContactMessagesTableSeeder::class,

			ColorsTableSeeder::class,

			MaterialsTableSeeder::class,
			CategoriesTableSeeder::class,
			CategoryProductsTableSeeder::class,

			ProductsTableSeeder::class,
			ItemsTableSeeder::class,
			ProductInfosTableSeeder::class,
			ProductSuppliersTableSeeder::class,
			StocksTableSeeder::class,

			ThemesTableSeeder::class,
			ThemeItemsTableSeeder::class,
			CampaignsTableSeeder::class,
			CampaignItemsTableSeeder::class,

			OfferCouponsTableSeeder::class,
			OfferPromotionsTableSeeder::class,
		]);
	}
}
