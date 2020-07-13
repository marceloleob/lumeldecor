<?php

use App\Models\ShopCart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('shop_carts')->delete();
    }
}
