<?php

use App\Models\ProductSize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_sizes')->delete();
		// cria os registros
		ProductSize::create([
			'product_id' => 1,
			'size'       => 'P',
			'weight'     => 0.487, // kg
			'pro_height' => 33,    // cm
			'pro_width'  => 22,    // cm
			'pro_length' => 22,    // cm
			'shi_height' => 33,    // cm
			'shi_width'  => 22,    // cm
			'shi_length' => 22,    // cm
		]);
    }
}
