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
		Color::create(['tone_id' => 1, 'name' => 'Vermelho', 'hexa' => '#DF0101', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Laranja', 'hexa' => '#FF8000', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Mostarda', 'hexa' => '#FFBF00', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Amarelo', 'hexa' => '#FFFF00', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Verde', 'hexa' => '#04B404', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Azul', 'hexa' => '#0101DF', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Roxo', 'hexa' => '#7401DF', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Rosa', 'hexa' => '#FF00FF', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Salmão', 'hexa' => '#FA8072', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Branco', 'hexa' => '#FFFFFF', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Preto', 'hexa' => '#000000', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Prata', 'hexa' => '#E6E6E6', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Dourado', 'hexa' => '#FFD700', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Cinza', 'hexa' => '#848484', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Marrom', 'hexa' => '#8A4B08', 'status' => 1]);
		Color::create(['tone_id' => 1, 'name' => 'Madeira', 'hexa' => '#EDDDBC', 'status' => 1]);
    }
}
