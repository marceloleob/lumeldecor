<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 *  1 - Cartonagens
	 *  2 - Cerâmicas
	 *  3 - Enfeitess
	 *  4 - Louças
	 *  5 - Luminosos
	 *  6 - Madeiras
	 *  7 - MDF
	 *  8 - Metais
	 *  9 - Pelúcias
	 * 10 - Plásticos
	 * 11 - Porcelanas
	 * 12 - Tecidos
	 * 13 - Vidros
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('categories')->delete();
		// CARTONAGEM
		Category::create(['material_id' => 1, 'name' => 'Caixas', 'status' => 1]);
		Category::create(['material_id' => 1, 'name' => 'Maletas', 'status' => 1]);
		// CERAMICAS
		Category::create(['material_id' => 2, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Bolas', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Boleiras', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Bules', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Canecas', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Decorações', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Pratos', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Redomas', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Vasos', 'status' => 1]);
		// ENFEITES (GENERICOS)
		Category::create(['material_id' => 3, 'name' => 'Decorações', 'status' => 1]);
		Category::create(['material_id' => 3, 'name' => 'Quadros', 'status' => 1]);
		// LOUCAS
		Category::create(['material_id' => 4, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 4, 'name' => 'Decorações', 'status' => 1]);
		Category::create(['material_id' => 4, 'name' => 'Pratos', 'status' => 1]);
		// LUMINOSOS
		Category::create(['material_id' => 5, 'name' => 'Abajour', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Cordões', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Luminárias', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'LED', 'status' => 1]);
		// MADEIRAS
		Category::create(['material_id' => 6, 'name' => 'Mesas', 'status' => 1]);
		// MDF
		Category::create(['material_id' => 7, 'name' => 'Bancos', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Boleros', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Caixas', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Criados', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Ninchos', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Placas', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Quadros', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Vasos', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Redomas', 'status' => 1]);
		// METAIS
		Category::create(['material_id' => 8, 'name' => 'Baldinhos', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Latinhas', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Maletas', 'status' => 1]);
		// PELUCIA
		Category::create(['material_id' => 9, 'name' => 'Animais', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Disney', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Marvel VS DC', 'status' => 1]);
		// PLASTICOS
		Category::create(['material_id' => 10, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Personagens', 'status' => 1]);
		// PORCELANAS
		Category::create(['material_id' => 11, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Bolas', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Boleiras', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Bules', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Canecas', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Decorações', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Pratos', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Redomas', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Vasos', 'status' => 1]);
		// TECIDOS
		Category::create(['material_id' => 12, 'name' => 'Painéis', 'status' => 1]);
		// VIDROS
		Category::create(['material_id' => 13, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 13, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 13, 'name' => 'Pratos', 'status' => 1]);
		Category::create(['material_id' => 13, 'name' => 'Vasos', 'status' => 1]);
	}
}
