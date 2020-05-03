<?php

use App\Models\ProductColor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_colors')->delete();
    }
}
