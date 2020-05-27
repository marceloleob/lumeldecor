<?php

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// limpa a tabela
		DB::table('materials')->delete();
		// cria os registros
		Material::create(['name' => 'Cartonagem', 'status' => 1]);
		Material::create(['name' => 'Cerâmica', 'status' => 1]);
		Material::create(['name' => 'Enfeite', 'status' => 1]);
		Material::create(['name' => 'Louça', 'status' => 1]);
		Material::create(['name' => 'Luminoso', 'status' => 1]);
		Material::create(['name' => 'Madeira', 'status' => 1]);
		Material::create(['name' => 'MDF', 'status' => 1]);
		Material::create(['name' => 'Metal', 'status' => 1]);
		Material::create(['name' => 'Plástico', 'status' => 1]);
		Material::create(['name' => 'Porcelana', 'status' => 1]);
		Material::create(['name' => 'Personagem', 'status' => 1]);
		Material::create(['name' => 'Vidro', 'status' => 1]);
    }
}
