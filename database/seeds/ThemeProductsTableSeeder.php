<?php

use App\Models\ThemeProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('theme_products')->delete();
		// cria os registros
		ThemeProduct::create([
			'theme_id'   => 6,
			'product_id' => 1
		]);
	}
}
