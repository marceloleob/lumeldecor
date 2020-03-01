<?php

use App\Models\ProductDimension;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_dimensions')->delete();
    }
}
