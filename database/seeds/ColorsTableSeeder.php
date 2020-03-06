<?php

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('colors')->delete();
		// cria os registros
		Color::create(['name' => '', 'hexa' => '', 'status' => 1]);
    }
}
