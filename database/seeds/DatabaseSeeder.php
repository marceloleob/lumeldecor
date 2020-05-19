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

			ColorsTableSeeder::class,
			ThemesTableSeeder::class,
			CampaignsTableSeeder::class,
			ContactMessagesTableSeeder::class,

			MaterialsTableSeeder::class,
			CategoriesTableSeeder::class,

			ItemsTableSeeder::class,
			ProductsTableSeeder::class,
			ProductInfosTableSeeder::class,
			ProductInfoThemesTableSeeder::class,

			CampaignProductsTableSeeder::class,

			OfferCouponsTableSeeder::class,
			OfferPromotionsTableSeeder::class,
		]);
	}
}
