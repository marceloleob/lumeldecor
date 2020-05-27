<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('products')->delete();
		// cria os registros
		Product::create([
			'product_info_id' => 1,
			'size'            => 'P',                        // tamanho (P,M,G,U)
			'slug'            => 'bandeja-lisa-de-ceramica', //"categoria"-"produto"-de-"material"
			'weight'          => 0.48,                       // kilogramas
			'height'          => 33,                         // centimetros
			'width'           => 22,                         // centimetros
			'length'          => 22,                         // centrimetros
			'status'          => 1,
		]);
	}
}
