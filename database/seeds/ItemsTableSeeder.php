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
			'product_size_id' => 1,
			'supplier_id'     => 1,
			'code'            => 'LM0205000010006100P',
			'picture'         => 'products/boleira-ceramica-lisa.jpg',
			'p_price'         => 19.80,
			's_price'         => 38.99,
			'launch'          => 1,
			'status'          => 1
		]);
	}
}
