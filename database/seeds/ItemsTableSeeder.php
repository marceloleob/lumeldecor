<?php

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('items')->delete();
		// cria os registros
		Item::create([
			'product_id'  => 1,
			'supplier_id' => 1,
			'color_id'    => 6,
			'code'        => '0203000001060P', // MATERIAL (99) + CATEGORIA (99) + PRODUTO (99999) + COR (99) + TAMANHO (P,M,G,U)
			'image'       => 'products/boleira-ceramica-lisa.jpg',
			'p_price'     => 19.80,          // preco no fornecedor
			's_price'     => 38.99,          // preco no site
			'launch'      => 1,
			'status'      => 1
		]);
	}
}
