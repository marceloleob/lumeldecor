<?php

namespace Database\Seeders;

use App\Models\ProductBundle;
use App\Models\ProductItem;
use Illuminate\Database\Seeder;

class BundleSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar os itens que vão compor o kit
        $bandejaLaranja = ProductItem::where('sku', 'BAND-35-LAR')->first();
        $canecaBranca = ProductItem::where('sku', 'CAN-300-BRA')->first();
        $buleBranco = ProductItem::where('sku', 'BULE-1L-BRA')->first();

        if (!$bandejaLaranja || !$canecaBranca || !$buleBranco) {
            $this->command->error('❌ Execute ProductSeeder antes!');
            return;
        }

        // Criar o bundle
        $bundle = ProductBundle::create([
            'name' => 'Kit Café da Manhã Luxo',
            'slug' => 'kit-cafe-manha-luxo',
            'sku' => 'KIT-CAFE-LUX',
            'description' => 'Kit completo para um café da manhã especial! Inclui bandeja decorativa, 2 canecas e bule de cerâmica. Economia de 15% comprando o kit completo.',
            'price' => 298.90,
            'compare_price' => 349.60, // preço individual: 99.90 + 49.90*2 + 89.90 = 289.60
            'track_inventory' => true, // valida estoque dos itens
            'is_active' => true,
            'is_featured' => true,
        ]);

        // Adicionar itens ao bundle
        $bundle->bundleItems()->create([
            'product_item_id' => $bandejaLaranja->id,
            'quantity' => 1,
        ]);

        $bundle->bundleItems()->create([
            'product_item_id' => $canecaBranca->id,
            'quantity' => 2,
        ]);

        $bundle->bundleItems()->create([
            'product_item_id' => $buleBranco->id,
            'quantity' => 1,
        ]);

        $this->command->info('✅ Kit Café da Manhã Luxo criado');
        $this->command->info('   Contém: 1 Bandeja + 2 Canecas + 1 Bule');
        $this->command->info('   Preço: R$ 298,90 (economiza R$ 50,70)');
    }
}
