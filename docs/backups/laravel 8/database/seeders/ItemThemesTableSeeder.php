<?php

namespace Database\Seeders;

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
    }
}
