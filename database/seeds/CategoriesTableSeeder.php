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
	 *  6 - Madeiras
	 *  7 - MDF
	 *  8 - Metais
	 *  9 - Plásticos
	 * 10 - Porcelanas
	 * 11 - Personagens
	 * 12 - Vidros
	 *
	 * @return void
	 */
	public function run()
	{
		// limpa a tabela
		DB::table('categories')->delete();
		// CARTONAGEM
		Category::create(['material_id' => 1, 'name' => 'Caixa', 'status' => 1]);
		Category::create(['material_id' => 1, 'name' => 'Maleta', 'status' => 1]);
		// CERAMICAS
		Category::create(['material_id' => 2, 'name' => 'Bandeja', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Bola', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Boleira', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Bule', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Caneca', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Prato', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Redoma', 'status' => 1]);
		Category::create(['material_id' => 2, 'name' => 'Vaso', 'status' => 1]);
		// ENFEITES (GENERICOS)
		Category::create(['material_id' => 3, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 3, 'name' => 'Quadro', 'status' => 1]);
		// LOUCAS
		Category::create(['material_id' => 4, 'name' => 'Bandeja', 'status' => 1]);
		Category::create(['material_id' => 4, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 4, 'name' => 'Prato', 'status' => 1]);
		// LUMINOSOS
		Category::create(['material_id' => 5, 'name' => 'Abajour', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Cordão', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Enfeite', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'Luminária', 'status' => 1]);
		Category::create(['material_id' => 5, 'name' => 'LED', 'status' => 1]);
		// MADEIRAS
		Category::create(['material_id' => 6, 'name' => 'Mesa', 'status' => 1]);
		// MDF
		Category::create(['material_id' => 7, 'name' => 'Banco', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Bandeja', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Bolero', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Caixa', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Criado', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Enfeite', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Nincho', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Placa', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Quadro', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Vaso', 'status' => 1]);
		Category::create(['material_id' => 7, 'name' => 'Redoma', 'status' => 1]);
		// METAIS
		Category::create(['material_id' => 8, 'name' => 'Baldinho', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Latinha', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Enfeite', 'status' => 1]);
		Category::create(['material_id' => 8, 'name' => 'Maleta', 'status' => 1]);
		// PLASTICOS
		Category::create(['material_id' => 9, 'name' => 'Bandeja', 'status' => 1]);
		Category::create(['material_id' => 9, 'name' => 'Enfeite', 'status' => 1]);
		// PORCELANAS
		Category::create(['material_id' => 10, 'name' => 'Bandeja', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Bola', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Boleira', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Bule', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Caneca', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Decoração', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Prato', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Redoma', 'status' => 1]);
		Category::create(['material_id' => 10, 'name' => 'Vaso', 'status' => 1]);
		// PERSONAGENS
		Category::create(['material_id' => 11, 'name' => 'Flamingo', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Mickey', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Minie', 'status' => 1]);
		Category::create(['material_id' => 11, 'name' => 'Astronauta', 'status' => 1]);
		// VIDROS
		Category::create(['material_id' => 12, 'name' => 'Enfeite', 'status' => 1]);
		Category::create(['material_id' => 12, 'name' => 'Vaso', 'status' => 1]);
	}
}
