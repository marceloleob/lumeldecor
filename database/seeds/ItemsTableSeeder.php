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
			'product_id' => 1,
			'color_id'   => 6,
			'image'      => 'teste.jpg',
			'launch'     => 1
		]);
	}
}
