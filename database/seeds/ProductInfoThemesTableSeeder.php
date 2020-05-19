<?php

use App\Models\ProductInfoTheme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductInfoThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_info_themes')->delete();
		// cria os registros
		ProductInfoTheme::create([
			'product_info_id' => 1,
			'theme_id'        => 6
		]);
		ProductInfoTheme::create([
			'product_info_id' => 1,
			'theme_id'        => 7
		]);
    }
}
