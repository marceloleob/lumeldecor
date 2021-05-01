<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ThemesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('themes')->delete();
		// cria os registros
		Theme::create(['name' => 'Carnaval', 'slug' => Str::slug('Carnaval'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Páscoa', 'slug' => Str::slug('Páscoa'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Namorados', 'slug' => Str::slug('Namorados'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'São João', 'slug' => Str::slug('São João'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Natal', 'slug' => Str::slug('Natal'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'A Bella e a Fera', 'slug' => Str::slug('A Bella e a Fera'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Bailarinas', 'slug' => Str::slug('Bailarinas'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Carros', 'slug' => Str::slug('Carros'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Fazendinha', 'slug' => Str::slug('Fazendinha'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Halloween', 'slug' => Str::slug('Halloween'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Marinheiro', 'slug' => Str::slug('Marinheiro'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Astronauta', 'slug' => Str::slug('Astronauta'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Chuva de Amor', 'slug' => Str::slug('Chuva de Amor'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Dinossauro', 'slug' => Str::slug('Dinossauro'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Disney', 'slug' => Str::slug('Disney'), 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Super Heróis', 'slug' => Str::slug('Super Heróis'), 'show' => 1, 'status' => 1]);
	}
}
