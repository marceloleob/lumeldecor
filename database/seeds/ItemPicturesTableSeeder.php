<?php

use App\Models\ItemPicture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemPicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('item_pictures')->delete();
		// cria os registros
    }
}
