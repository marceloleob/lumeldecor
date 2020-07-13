<?php

use App\Models\ShopCookie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopCookiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('shop_cookies')->delete();
    }
}
