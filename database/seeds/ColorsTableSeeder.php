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
		Color::create(['name' => 'Rosa', 'status' => 1]);
		Color::create(['name' => 'Roxo', 'status' => 1]);
		Color::create(['name' => 'Vermelho', 'status' => 1]);
		Color::create(['name' => 'Laranja', 'status' => 1]);
		Color::create(['name' => 'Amarelo', 'status' => 1]);
		Color::create(['name' => 'Verde', 'status' => 1]);
		Color::create(['name' => 'Azul', 'status' => 1]);
		Color::create(['name' => 'Marrom', 'status' => 1]);
		Color::create(['name' => 'Cores Pastéis', 'status' => 1]);
		Color::create(['name' => 'Cinza', 'status' => 1]);
		Color::create(['name' => 'Neon', 'status' => 1]);
		Color::create(['name' => 'Metálico', 'status' => 1]);

    }
}
