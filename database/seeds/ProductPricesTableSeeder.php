<?php

use App\Models\ProductPrice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_prices')->delete();
    }
}
