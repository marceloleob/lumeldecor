<?php

use App\Models\ItemTheme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('item_themes')->delete();
		// cria os registros
		// ItemTheme::create([
		// 	'item_id'  => 1,
		// 	'theme_id' => 6
		// ]);
		// ItemTheme::create([
		// 	'item_id'  => 1,
		// 	'theme_id' => 7
		// ]);
    }
}
