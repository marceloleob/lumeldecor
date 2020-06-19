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
		Color::create(['name' => 'Rosa', 'icon' => 'pink', 'status' => 1]);
		Color::create(['name' => 'Roxo', 'icon' => 'violet', 'status' => 1]);
		Color::create(['name' => 'Vermelho', 'icon' => 'red', 'status' => 1]);
		Color::create(['name' => 'Laranja', 'icon' => 'orange', 'status' => 1]);
		Color::create(['name' => 'Amarelo', 'icon' => 'yellow', 'status' => 1]);
		Color::create(['name' => 'Verde', 'icon' => 'green', 'status' => 1]);
		Color::create(['name' => 'Azul', 'icon' => 'blue', 'status' => 1]);
		Color::create(['name' => 'Marrom', 'icon' => 'brown', 'status' => 1]);
		Color::create(['name' => 'Cores Pastéis', 'icon' => 'pastel', 'status' => 1]);
		Color::create(['name' => 'Cinza', 'icon' => 'gray', 'status' => 1]);
		Color::create(['name' => 'Neon', 'icon' => 'neon', 'status' => 1]);
		Color::create(['name' => 'Metálico', 'icon' => 'metal', 'status' => 1]);

    }
}
