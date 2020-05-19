<?php

use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('category_products')->delete();
		// cria os registros
		CategoryProduct::create([
			'category_id' => 8,
			'product_id'  => 1
		]);
    }
}
