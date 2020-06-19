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
		Material::create(['name' => 'Cartonagens', 'status' => 1]);
		Material::create(['name' => 'Cerâmicas', 'status' => 1]);
		Material::create(['name' => 'Enfeites', 'status' => 1]);
		Material::create(['name' => 'Louças', 'status' => 1]);
		Material::create(['name' => 'Luminosos', 'status' => 1]);
		Material::create(['name' => 'Madeiras', 'status' => 1]);
		Material::create(['name' => 'MDF', 'status' => 1]);
		Material::create(['name' => 'Metais', 'status' => 1]);
		Material::create(['name' => 'Pelúcias', 'status' => 1]);
		Material::create(['name' => 'Plásticos', 'status' => 1]);
		Material::create(['name' => 'Porcelanas', 'status' => 1]);
		Material::create(['name' => 'Tecidos', 'status' => 1]);
		Material::create(['name' => 'Vidros', 'status' => 1]);
    }
}
