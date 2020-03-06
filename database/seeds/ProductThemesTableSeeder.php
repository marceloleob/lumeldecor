<?php

use App\Models\ProductTheme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_themes')->delete();
    }
}
