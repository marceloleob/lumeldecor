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
		Color::create(['name' => 'Vermelho', 'hexa' => '#DF0101', 'status' => 1]);
		Color::create(['name' => 'Laranja', 'hexa' => '#FF8000', 'status' => 1]);
		Color::create(['name' => 'Mostarda', 'hexa' => '#FFBF00', 'status' => 1]);
		Color::create(['name' => 'Amarelo', 'hexa' => '#FFFF00', 'status' => 1]);
		Color::create(['name' => 'Verde', 'hexa' => '#04B404', 'status' => 1]);
		Color::create(['name' => 'Azul', 'hexa' => '#0101DF', 'status' => 1]);
		Color::create(['name' => 'Roxo', 'hexa' => '#7401DF', 'status' => 1]);
		Color::create(['name' => 'Rosa', 'hexa' => '#FF00FF', 'status' => 1]);
		Color::create(['name' => 'Salmão', 'hexa' => '#FA8072', 'status' => 1]);
		Color::create(['name' => 'Branco', 'hexa' => '#FFFFFF', 'status' => 1]);
		Color::create(['name' => 'Preto', 'hexa' => '#000000', 'status' => 1]);
		Color::create(['name' => 'Prata', 'hexa' => '#E6E6E6', 'status' => 1]);
		Color::create(['name' => 'Dourado', 'hexa' => '#FFD700', 'status' => 1]);
		Color::create(['name' => 'Cinza', 'hexa' => '#848484', 'status' => 1]);
		Color::create(['name' => 'Marrom', 'hexa' => '#8A4B08', 'status' => 1]);
    }
}
