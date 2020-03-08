<?php

use App\Models\ProductItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_items')->delete();
    }
}
