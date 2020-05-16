<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
		Theme::create(['name' => 'A Bella e a Fera', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Bailarinas', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Carros', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Fazendinha', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Halloween', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Marinheiro', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Natal', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Namorados', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Astronauta', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Chuva de Amor', 'show' => 1, 'status' => 1]);
		Theme::create(['name' => 'Dinossauro', 'show' => 1, 'status' => 1]);
	}
}
