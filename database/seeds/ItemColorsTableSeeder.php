<?php

use App\Models\ItemColor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('item_colors')->delete();
		// cria os registros
		ItemColor::create([
			'item_id'  => 1,
			'color_id' => 6
		]);
		ItemColor::create([
			'item_id'  => 1,
			'color_id' => 7
		]);
    }
}
