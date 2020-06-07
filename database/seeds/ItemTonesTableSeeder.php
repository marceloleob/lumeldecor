<?php

use App\Models\ItemTone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('item_tones')->delete();
    }
}
