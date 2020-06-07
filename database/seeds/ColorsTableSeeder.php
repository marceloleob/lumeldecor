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
		// cria os registros de Entradas
		// Color::create(['name' => 'Azul', 'status' => 1]);
		// Color::create(['name' => 'Verde', 'status' => 1]);
		// Color::create(['name' => 'Amarelo', 'status' => 1]);
		// Color::create(['name' => 'Vermelho', 'status' => 1]);
		// Color::create(['name' => 'Rosa', 'status' => 1]);
		// Color::create(['name' => 'Metálico', 'status' => 1]);
		// Color::create(['name' => 'Neon', 'status' => 1]);

		Color::create(['name' => 'Pink Colors', 'status' => 1]);
		Color::create(['name' => 'Purple Colors', 'status' => 1]);
		Color::create(['name' => 'Red Colors', 'status' => 1]);
		Color::create(['name' => 'Orange Colors', 'status' => 1]);
		Color::create(['name' => 'Yellow Colors', 'status' => 1]);
		Color::create(['name' => 'Green Colors', 'status' => 1]);
		Color::create(['name' => 'Cyan Colors', 'status' => 1]);
		Color::create(['name' => 'Blue Colors', 'status' => 1]);
		Color::create(['name' => 'Brown Colors', 'status' => 1]);
		Color::create(['name' => 'White Colors', 'status' => 1]);
		Color::create(['name' => 'Grey Colors', 'status' => 1]);

    }
}
