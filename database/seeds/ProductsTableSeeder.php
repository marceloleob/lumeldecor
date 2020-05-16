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
			'item_id'     => 1,
			'supplier_id' => 1,
			'code'        => '02030000106P', // MATERIAL (99) + CATEGORIA (99) + PRODUTO (99999) + COR (99) + TAMANHO (P,M,G)
			'size'        => 'P',
			'weight'      => 0.48,   // kilogramas
			'height'      => 33,     // centimetros
			'width'       => 22,     // centimetros
			'length'      => 22,     // centrimetros
			'p_price'     => 8.99,   // preco no fornecedor
			's_price'     => 19.49,  // preco no site
		]);
	}
}
