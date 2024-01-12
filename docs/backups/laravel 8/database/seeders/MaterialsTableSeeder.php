<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
		Material::create(['name' => 'Cartonagens', 'slug' => Str::slug('Cartonagens'), 'status' => 1]);
		Material::create(['name' => 'Cerâmicas', 'slug' => Str::slug('Cerâmicas'), 'status' => 1]);
		Material::create(['name' => 'Enfeites', 'slug' => Str::slug('Enfeites'), 'status' => 1]);
		Material::create(['name' => 'Louças', 'slug' => Str::slug('Louças'), 'status' => 1]);
		Material::create(['name' => 'Luminosos', 'slug' => Str::slug('Luminosos'), 'status' => 1]);
		Material::create(['name' => 'Madeiras', 'slug' => Str::slug('Madeiras'), 'status' => 1]);
		Material::create(['name' => 'MDF', 'slug' => Str::slug('MDF'), 'status' => 1]);
		Material::create(['name' => 'Metais', 'slug' => Str::slug('Metais'), 'status' => 1]);
		Material::create(['name' => 'Pelúcias', 'slug' => Str::slug('Pelúcias'), 'status' => 1]);
		Material::create(['name' => 'Plásticos', 'slug' => Str::slug('Plásticos'), 'status' => 1]);
		Material::create(['name' => 'Porcelanas', 'slug' => Str::slug('Porcelanas'), 'status' => 1]);
		Material::create(['name' => 'Tecidos', 'slug' => Str::slug('Tecidos'), 'status' => 1]);
		Material::create(['name' => 'Vidros', 'slug' => Str::slug('Vidros'), 'status' => 1]);
    }
}
