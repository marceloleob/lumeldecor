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
        $this->call(
			StatesTableSeeder::class,
			CitiesTableSeeder::class,

			CategoriesTableSeeder::class,
			MaterialsTableSeeder::class,

			ProductInfosTableSeeder::class,
			ProductPhotosTableSeeder::class,
			ProductPricesTableSeeder::class,
			ProductsTableSeeder::class,

			SupplierContactsTableSeeder::class,
			SupplierPricesTableSeeder::class,
			SuppliersTableSeeder::class,

			EmailsTableSeeder::class,
			UsersTableSeeder::class,
			CustomersTableSeeder::class
		);
    }
}
