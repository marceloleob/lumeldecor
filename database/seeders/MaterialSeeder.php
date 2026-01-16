<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            ['name' => 'MDF', 'description' => 'Medium Density Fiberboard - Fibra de média densidade'],
            ['name' => 'Cerâmica', 'description' => 'Louça cerâmica esmaltada'],
            ['name' => 'Vidro', 'description' => 'Vidro temperado e comum'],
            ['name' => 'Metal', 'description' => 'Ferro, alumínio e outros metais'],
            ['name' => 'Porcelana', 'description' => 'Porcelana fina'],
            ['name' => 'Madeira', 'description' => 'Madeira natural'],
            ['name' => 'Plástico', 'description' => 'Plástico resistente'],
            ['name' => 'Tecido', 'description' => 'Tecidos diversos'],
            ['name' => 'Pelúcia', 'description' => 'Pelúcia macia'],
            ['name' => 'Resina', 'description' => 'Resina decorativa'],
            ['name' => 'Acrílico', 'description' => 'Acrílico transparente e colorido'],
            ['name' => 'Cartonagem', 'description' => 'Papel cartão estruturado'],
            ['name' => 'Louça', 'description' => 'Louça esmaltada para decoração e utilitários'],
            ['name' => 'Luminoso', 'description' => 'Produtos com iluminação LED embutida'],
        ];

        foreach ($materials as $material) {
            Material::create([
                'name' => $material['name'],
                'slug' => Str::slug($material['name']),
                'description' => $material['description'],
                'is_active' => true,
                'order' => 0,
            ]);
        }

        $this->command->info('-> ' . count($materials) . ' materiais criados com sucesso!');
    }
}
