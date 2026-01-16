<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // CATEGORIAS PRINCIPAIS
        // ========================================

        $mainCategories = [
            ['name' => 'Bandejas', 'description' => 'Bandejas decorativas para servir e organizar'],
            ['name' => 'Boleiras', 'description' => 'Boleiras e cúpulas para bolos e doces'],
            ['name' => 'Luminárias', 'description' => 'Luminárias e iluminação decorativa'],
            ['name' => 'Quadros', 'description' => 'Quadros e painéis decorativos de parede'],
            ['name' => 'Vasos', 'description' => 'Vasos decorativos para flores e plantas'],
            ['name' => 'Caixas', 'description' => 'Caixas organizadoras e decorativas'],
            ['name' => 'Nichos', 'description' => 'Nichos e prateleiras de parede'],
            ['name' => 'Móveis', 'description' => 'Móveis decorativos e funcionais'],
            ['name' => 'Utilitários', 'description' => 'Itens úteis e decorativos para o dia a dia'],
            ['name' => 'Enfeites', 'description' => 'Enfeites, decorações e objetos decorativos'],
        ];

        foreach ($mainCategories as $index => $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
                'parent_id' => null,
                'is_active' => true,
                'order' => $index,
            ]);
        }

        // ========================================
        // SUBCATEGORIAS
        // ========================================

        // Luminárias > Subcategorias
        $luminarias = Category::where('slug', 'luminarias')->first();

        $subcategoriesLuminarias = [
            ['name' => 'Abajour', 'description' => 'Abajours de mesa e cabeceira'],
            ['name' => 'LED', 'description' => 'Luminárias com iluminação LED'],
            ['name' => 'Luminárias de Mesa', 'description' => 'Luminárias para mesa e escrivaninha'],
            ['name' => 'Luminárias de Parede', 'description' => 'Arandelas e luminárias de parede'],
            ['name' => 'Cordões de Luz', 'description' => 'Cordões luminosos e varais de luz LED'],
        ];

        foreach ($subcategoriesLuminarias as $index => $sub) {
            Category::create([
                'name' => $sub['name'],
                'slug' => Str::slug($sub['name']),
                'description' => $sub['description'],
                'parent_id' => $luminarias->id,
                'is_active' => true,
                'order' => $index,
            ]);
        }

        // Quadros > Subcategorias
        $quadros = Category::where('slug', 'quadros')->first();

        $subcategoriesQuadros = [
            ['name' => 'Painéis Decorativos', 'description' => 'Painéis grandes decorativos de parede'],
            ['name' => 'Placas Decorativas', 'description' => 'Placas com frases e mensagens'],
        ];

        foreach ($subcategoriesQuadros as $index => $sub) {
            Category::create([
                'name' => $sub['name'],
                'slug' => Str::slug($sub['name']),
                'description' => $sub['description'],
                'parent_id' => $quadros->id,
                'is_active' => true,
                'order' => $index,
            ]);
        }

        // Enfeites > Subcategorias
        $enfeites = Category::where('slug', 'enfeites')->first();

        $subcategoriesEnfeites = [
            ['name' => 'Bichinhos', 'description' => 'Bichinhos e animais decorativos'],
            ['name' => 'Personagens', 'description' => 'Personagens e figuras decorativas'],
            ['name' => 'Decorações Sazonais', 'description' => 'Decorações para datas comemorativas'],
            ['name' => 'Redomas', 'description' => 'Redomas de vidro decorativas'],
            ['name' => 'Bolas Decorativas', 'description' => 'Bolas decorativas para mesa e estante'],
            ['name' => 'Baldinhos', 'description' => 'Baldinhos decorativos e organizadores'],
            ['name' => 'Latinhas', 'description' => 'Latinhas vintage e decorativas'],
            ['name' => 'Maletas', 'description' => 'Maletas e baús decorativos'],
        ];

        foreach ($subcategoriesEnfeites as $index => $sub) {
            Category::create([
                'name' => $sub['name'],
                'slug' => Str::slug($sub['name']),
                'description' => $sub['description'],
                'parent_id' => $enfeites->id,
                'is_active' => true,
                'order' => $index,
            ]);
        }

        // Móveis > Subcategorias
        $moveis = Category::where('slug', 'moveis')->first();

        $subcategoriesMoveis = [
            ['name' => 'Bancos', 'description' => 'Bancos, banquetas e puffs'],
            ['name' => 'Criados-mudos', 'description' => 'Criados-mudos e mesinhas de cabeceira'],
            ['name' => 'Mesas', 'description' => 'Mesas, mesinhas e aparadores'],
        ];

        foreach ($subcategoriesMoveis as $index => $sub) {
            Category::create([
                'name' => $sub['name'],
                'slug' => Str::slug($sub['name']),
                'description' => $sub['description'],
                'parent_id' => $moveis->id,
                'is_active' => true,
                'order' => $index,
            ]);
        }

        // Utilitários > Subcategorias
        $utilitarios = Category::where('slug', 'utilitarios')->first();

        $subcategoriesUtilitarios = [
            ['name' => 'Bules', 'description' => 'Bules decorativos para chá e café'],
            ['name' => 'Canecas', 'description' => 'Canecas decorativas'],
            ['name' => 'Pratos', 'description' => 'Pratos decorativos de parede e mesa'],
        ];

        foreach ($subcategoriesUtilitarios as $index => $sub) {
            Category::create([
                'name' => $sub['name'],
                'slug' => Str::slug($sub['name']),
                'description' => $sub['description'],
                'parent_id' => $utilitarios->id,
                'is_active' => true,
                'order' => $index,
            ]);
        }

        $this->command->info('-> Categorias e subcategorias criadas com sucesso!');
    }
}
