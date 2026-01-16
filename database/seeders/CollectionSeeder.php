<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\ProductItem;
use App\Models\CollectionImage;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        // Criar coleção Arraiá
        $arraia = Collection::create([
            'name' => 'Arraiá 2025',
            'slug' => 'arraia-2025',
            'description' => 'Monte sua festa junina com estilo! Confira nossa seleção especial de produtos para o seu arraiá. Bandejas, luminárias e utilitários com o charme da festa junina.',
            'cover_image' => 'collections/arraia-2025-cover.jpg',
            'meta_title' => 'Decoração Festa Junina - Arraiá 2025 | Lumel Decor',
            'meta_description' => 'Produtos especiais para decorar sua festa junina. Bandejas, luminárias e muito mais!',
            'starts_at' => now()->setMonth(5)->setDay(1), // 1º de Maio
            'ends_at' => now()->setMonth(6)->setDay(30),  // 30 de Junho
            'is_active' => true,
            'is_featured' => true,
        ]);

        // Adicionar imagem da coleção
        CollectionImage::create([
            'collection_id' => $arraia->id,
            'path' => 'collections/arraia-2025-ambiente.jpg',
            'alt_text' => 'Ambiente decorado para Festa Junina - Arraiá 2025',
            'is_primary' => true,
        ]);

        // Buscar produtos para adicionar na coleção
        $bandejaLaranja35 = ProductItem::where('sku', 'BAND-35-LAR')->first();
        $bandejaLaranja45 = ProductItem::where('sku', 'BAND-45-LAR')->first();
        $luminariaRosa = ProductItem::where('sku', 'LUM-NUV-ROS')->first();
        $canecaBranca = ProductItem::where('sku', 'CAN-300-BRA')->first();
        $buleBranco = ProductItem::where('sku', 'BULE-1L-BRA')->first();

        $items = [
            $bandejaLaranja35,
            $bandejaLaranja45,
            $luminariaRosa,
            $canecaBranca,
            $buleBranco,
        ];

        foreach ($items as $index => $item) {
            if ($item) {
                $arraia->items()->create([
                    'product_item_id' => $item->id,
                    'is_highlighted' => $index === 0, // destaca a primeira bandeja
                ]);
            }
        }

        $this->command->info('✅ Coleção Arraiá 2025 criada com ' . $arraia->items()->count() . ' produtos');

        // ========================================
        // Criar coleção Dia dos Namorados
        // ========================================

        $namorados = Collection::create([
            'name' => 'Dia dos Namorados 2025',
            'slug' => 'dia-dos-namorados-2025',
            'description' => 'Presentes especiais para surpreender quem você ama. Kits, luminárias e peças decorativas românticas.',
            'cover_image' => 'collections/namorados-2025-cover.jpg',
            'starts_at' => now()->setMonth(5)->setDay(20), // 20 de Maio
            'ends_at' => now()->setMonth(6)->setDay(12),   // 12 de Junho
            'is_active' => true,
            'is_featured' => true,
        ]);

        CollectionImage::create([
            'collection_id' => $namorados->id,
            'path' => 'collections/namorados-2025-ambiente.jpg',
            'alt_text' => 'Decoração romântica - Dia dos Namorados 2025',
            'is_primary' => true,
        ]);

        // Adicionar produtos românticos
        $luminariaRosa = ProductItem::where('sku', 'LUM-NUV-ROS')->first();
        $bandejaDourada35 = ProductItem::where('sku', 'BAND-35-DOU')->first();

        if ($luminariaRosa) {
            $namorados->items()->create([
                'product_item_id' => $luminariaRosa->id,
                'is_highlighted' => true,
            ]);
        }

        if ($bandejaDourada35) {
            $namorados->items()->create([
                'product_item_id' => $bandejaDourada35->id,
            ]);
        }

        $this->command->info('✅ Coleção Dia dos Namorados 2025 criada');
    }
}
