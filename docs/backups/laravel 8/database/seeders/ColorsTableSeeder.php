<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
		Color::create(['name' => 'Rosa', 'slug' => Str::slug('Rosa'), 'icon' => 'pink.png', 'status' => 1]);
		Color::create(['name' => 'Roxo', 'slug' => Str::slug('Roxo'), 'icon' => 'violet.png', 'status' => 1]);
		Color::create(['name' => 'Vermelho', 'slug' => Str::slug('Vermelho'), 'icon' => 'red.png', 'status' => 1]);
		Color::create(['name' => 'Laranja', 'slug' => Str::slug('Laranja'), 'icon' => 'orange.png', 'status' => 1]);
		Color::create(['name' => 'Amarelo', 'slug' => Str::slug('Amarelo'), 'icon' => 'yellow.png', 'status' => 1]);
		Color::create(['name' => 'Verde', 'slug' => Str::slug('Verde'), 'icon' => 'green.png', 'status' => 1]);
		Color::create(['name' => 'Azul', 'slug' => Str::slug('Azul'), 'icon' => 'blue.png', 'status' => 1]);
		Color::create(['name' => 'Marrom', 'slug' => Str::slug('Marrom'), 'icon' => 'brown.png', 'status' => 1]);
		Color::create(['name' => 'Cores Pastéis', 'slug' => Str::slug('Cores Pastéis'), 'icon' => 'pastel.png', 'status' => 1]);
		Color::create(['name' => 'Cinza', 'slug' => Str::slug('Cinza'), 'icon' => 'gray.png', 'status' => 1]);
		Color::create(['name' => 'Neon', 'slug' => Str::slug('Neon'), 'icon' => 'neon.png', 'status' => 1]);
		Color::create(['name' => 'Metálico', 'slug' => Str::slug('Metálico'), 'icon' => 'metal.png', 'status' => 1]);

    }
}
