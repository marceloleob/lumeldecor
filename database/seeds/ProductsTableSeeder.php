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
			'category_id' => 3,
			'name'        => 'Lisa Sextavada',
			'slug'        => 'bandeja-lisa-sextavada-de-ceramica',
			'picture'     => null,
			'description' => 'Aqui vai a descrição do produto!',
			'hashtag'     => 'hashtagteste',
			'featured'    => 1,
			'launch'      => 0,
			'status'      => 1,
		]);
	}
}
