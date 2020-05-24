<?php

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('stocks')->delete();
		// cria os registros
		Stock::create([
			'product_id' => 1,
			'item_id'    => 1,
			'user_id'    => 2,
			'action'     => 'incoming',
			'incoming'   => 44,
			'outcoming'  => null,
			'balance'    => 44
        ]);
    }
}
