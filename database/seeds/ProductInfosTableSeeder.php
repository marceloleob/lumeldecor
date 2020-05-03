<?php

use App\Models\ProductInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_infos')->delete();
    }
}
