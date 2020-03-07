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
			UsersTableSeeder::class,
			CustomersTableSeeder::class,
			EmailsTableSeeder::class,

			StatesTableSeeder::class,
			CitiesTableSeeder::class,

			MaterialsTableSeeder::class,
			CategoriesTableSeeder::class,
			ColorsTableSeeder::class,
			ThemesTableSeeder::class,

			ProductsTableSeeder::class,
			ProductInfosTableSeeder::class,
			ProductPricesTableSeeder::class,
			ProductPhotosTableSeeder::class,
			ProductColorsTableSeeder::class,
			ProductThemesTableSeeder::class,

			SuppliersTableSeeder::class,
			SupplierContactsTableSeeder::class,
			SupplierPricesTableSeeder::class,

			OfferCouponsTableSeeder::class,
			OfferPromotionsTableSeeder::class,
		]);
    }
}
