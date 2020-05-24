<?php

use App\Models\ThemeItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('theme_items')->delete();
		// cria os registros
		ThemeItem::create([
			'theme_id' => 6,
			'item_id'  => 1
		]);
		ThemeItem::create([
			'theme_id' => 7,
			'item_id'  => 1
		]);
    }
}
