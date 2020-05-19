<?php

use App\Models\ProductSupplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('product_suppliers')->delete();
		// cria os registros
		ProductSupplier::create([
			'item_id'     => 1,
			'supplier_id' => 1,
			'price'       => 13.49,  // preco no fornecedor
		]);
    }
}
