<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('categories')->delete();
		// cria os registros
		Category::create(['name' => 'Abajour', 'slug' => Str::slug('Abajour'), 'status' => 1]);
		Category::create(['name' => 'Baldinhos', 'slug' => Str::slug('Baldinhos'), 'status' => 1]);
		Category::create(['name' => 'Bandejas', 'slug' => Str::slug('Bandejas'), 'status' => 1]);
		Category::create(['name' => 'Bancos', 'slug' => Str::slug('Bancos'), 'status' => 1]);
		Category::create(['name' => 'Bolas', 'slug' => Str::slug('Bolas'), 'status' => 1]);
		Category::create(['name' => 'Boleiras', 'slug' => Str::slug('Boleiras'), 'status' => 1]);
		Category::create(['name' => 'Bichinhos', 'slug' => Str::slug('Bichinhos'), 'status' => 1]);
		Category::create(['name' => 'Bules', 'slug' => Str::slug('Bules'), 'status' => 1]);
		Category::create(['name' => 'Canecas', 'slug' => Str::slug('Canecas'), 'status' => 1]);
		Category::create(['name' => 'Caixas', 'slug' => Str::slug('Caixas'), 'status' => 1]);
		Category::create(['name' => 'Cordões', 'slug' => Str::slug('Cordões'), 'status' => 1]);
		Category::create(['name' => 'Criados', 'slug' => Str::slug('Criados'), 'status' => 1]);
		Category::create(['name' => 'Decorações', 'slug' => Str::slug('Decorações'), 'status' => 1]);
		Category::create(['name' => 'Enfeites', 'slug' => Str::slug('Enfeites'), 'status' => 1]);
		Category::create(['name' => 'Latinhas', 'slug' => Str::slug('Latinhas'), 'status' => 1]);
		Category::create(['name' => 'LED', 'slug' => Str::slug('LED'), 'status' => 1]);
		Category::create(['name' => 'Luminárias', 'slug' => Str::slug('Luminárias'), 'status' => 1]);
		Category::create(['name' => 'Maletas', 'slug' => Str::slug('Maletas'), 'status' => 1]);
		Category::create(['name' => 'Mesas', 'slug' => Str::slug('Mesas'), 'status' => 1]);
		Category::create(['name' => 'Ninchos', 'slug' => Str::slug('Ninchos'), 'status' => 1]);
		Category::create(['name' => 'Personagens', 'slug' => Str::slug('Personagens'), 'status' => 1]);
		Category::create(['name' => 'Painéis', 'slug' => Str::slug('Painéis'), 'status' => 1]);
		Category::create(['name' => 'Placas', 'slug' => Str::slug('Placas'), 'status' => 1]);
		Category::create(['name' => 'Pratos', 'slug' => Str::slug('Pratos'), 'status' => 1]);
		Category::create(['name' => 'Quadros', 'slug' => Str::slug('Quadros'), 'status' => 1]);
		Category::create(['name' => 'Redomas', 'slug' => Str::slug('Redomas'), 'status' => 1]);
		Category::create(['name' => 'Vasos', 'slug' => Str::slug('Vasos'), 'status' => 1]);
	}
}
