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
			'category_id' => 3,
			'name'        => 'Lisa',
			'hashtag'     => '',
			'description' => 'Aqui vai a descrição do produto!',
			'featured'    => 1,
			'status'      => 1,
		]);
	}
}
