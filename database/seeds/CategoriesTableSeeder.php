<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 *  1 - Cartonagem
	 *  2 - Cerâmicas
	 *  3 - Enfeites
	 *  4 - Louças
	 *  5 - Luminosos
	 *  6 - MDF
	 *  7 - Metais
	 *  8 - Plásticos
	 *  9 - Porcelanas
	 * 10 - Pelúcias
	 * 11 - Vidros
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
		Category::create(['material_id' => 2, 'name' => 'Bola', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Boleiras', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Bule', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Canecas', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Pratos', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Redomas', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Vasos', 'status' => 1]);
		// ENFEITES (GENERICOS)
		Category::create(['material_id' => 3, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 3, 'name' => 'Quadros', 'status' => 1]);
		// LOUCAS
		Category::create(['material_id' => 4, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 4, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 4, 'name' => 'Pratos', 'status' => 1]);
		// LUMINOSOS
		Category::create(['material_id' => 5, 'name' => 'Abajour', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Cordões', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Luminárias', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'LED', 'status' => 1]);
		// MDF
		Category::create(['material_id' => 6, 'name' => 'Bancos', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Boleros', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Caixas', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Criados', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Ninchos', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Placas', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Quadros', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Vasos', 'status' => 1]);
		Category::create(['material_id' => 6, 'name' => 'Redomas', 'status' => 1]);
		// METAIS
		Category::create(['material_id' => 7, 'name' => 'Baldinhos', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Latinhas', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Maletas', 'status' => 1]);
		// PLASTICOS
		Category::create(['material_id' => 8, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Enfeites', 'status' => 1]);
		// PORCELANAS
		Category::create(['material_id' => 9, 'name' => 'Bandejas', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Bola', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Boleiras', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Bule', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Canecas', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Pratos', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Redomas', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Vasos', 'status' => 1]);
		// PELUCIAS
		Category::create(['material_id' => 10, 'name' => 'Flamingos', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Mickey', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Minie', 'status' => 1]);
		// VIDROS
		Category::create(['material_id' => 10, 'name' => 'Enfeites', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Vasos', 'status' => 1]);
    }
}
