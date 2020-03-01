<?php

use App\Models\SupplierPrice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('supplier_prices')->delete();
    }
}
