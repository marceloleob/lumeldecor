<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductItem;
use App\Models\ProductItemImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // 1. BANDEJA DE BOLO REDONDA
        // ========================================

        $categoriaBandejas = Category::where('slug', 'bandejas')->first();
        $materialCeramica = Material::where('slug', 'ceramica')->first();

        $bandeja = Product::create([
            'category_id' => $categoriaBandejas->id,
            'material_id' => $materialCeramica->id,
            'name' => 'Bandeja de Bolo Redonda',
            'slug' => 'bandeja-bolo-redonda',
            'description' => 'Linda bandeja redonda em cerâmica de alta qualidade, perfeita para servir bolos, tortas e doces. Acabamento esmaltado que realça a beleza da sua mesa. Ideal para festas, chás e ocasiões especiais.',
            'short_description' => 'Bandeja redonda em cerâmica esmaltada',
            'is_active' => true,
            'is_featured' => true,
        ]);

        // Tamanho 35cm
        $size35 = ProductSize::create([
            'product_id' => $bandeja->id,
            'size' => '35cm',
            'shape' => 'Redonda',
            'weight' => 800, // gramas
            'width' => 35,   // cm
            'height' => 5,   // cm
            'length' => 35,  // cm
            'is_active' => true,
        ]);

        // Tamanho 45cm
        $size45 = ProductSize::create([
            'product_id' => $bandeja->id,
            'size' => '45cm',
            'shape' => 'Redonda',
            'weight' => 1200,
            'width' => 45,
            'height' => 6,
            'length' => 45,
            'is_active' => true,
        ]);

        // Items do tamanho 35cm
        $cores35 = [
            ['color' => 'Branca', 'price' => 129.90, 'stock' => 15],
            ['color' => 'Laranja', 'price' => 99.90, 'compare_price' => 129.90, 'stock' => 25], // promoção!
            ['color' => 'Dourada', 'price' => 149.90, 'stock' => 8],
        ];

        foreach ($cores35 as $index => $cor) {
            $item = ProductItem::create([
                'product_id' => $bandeja->id,
                'product_size_id' => $size35->id,
                'sku' => 'BAND-35-' . strtoupper(substr($cor['color'], 0, 3)),
                'color' => $cor['color'],
                'price' => $cor['price'],
                'compare_price' => $cor['compare_price'] ?? null,
                'supplier_price' => $cor['price'] * 0.6, // custo = 60% do preço
                'stock_quantity' => $cor['stock'],
                'min_stock' => 5,
                'is_active' => true,
                'is_featured' => $index === 1, // destaca a promoção (laranja)
            ]);

            // Criar imagem placeholder
            ProductItemImage::create([
                'product_item_id' => $item->id,
                'path' => 'products/bandeja-' . strtolower($cor['color']) . '-35.jpg',
                'alt_text' => 'Bandeja de Bolo Redonda 35cm ' . $cor['color'],
                'order' => 0,
                'is_primary' => true,
            ]);
        }

        // Items do tamanho 45cm
        $cores45 = [
            ['color' => 'Branca', 'price' => 179.90, 'stock' => 10],
            ['color' => 'Laranja', 'price' => 149.90, 'compare_price' => 179.90, 'stock' => 18],
            ['color' => 'Dourada', 'price' => 199.90, 'stock' => 5],
        ];

        foreach ($cores45 as $cor) {
            $item = ProductItem::create([
                'product_id' => $bandeja->id,
                'product_size_id' => $size45->id,
                'sku' => 'BAND-45-' . strtoupper(substr($cor['color'], 0, 3)),
                'color' => $cor['color'],
                'price' => $cor['price'],
                'compare_price' => $cor['compare_price'] ?? null,
                'supplier_price' => $cor['price'] * 0.6,
                'stock_quantity' => $cor['stock'],
                'min_stock' => 3,
                'is_active' => true,
            ]);

            ProductItemImage::create([
                'product_item_id' => $item->id,
                'path' => 'products/bandeja-' . strtolower($cor['color']) . '-45.jpg',
                'alt_text' => 'Bandeja de Bolo Redonda 45cm ' . $cor['color'],
                'order' => 0,
                'is_primary' => true,
            ]);
        }

        $this->command->info('✅ Bandeja de Bolo criada com 6 variantes');

        // ========================================
        // 2. LUMINÁRIA LED NUVEM
        // ========================================

        $categoriaLuminarias = Category::where('slug', 'luminarias')->first();
        $materialLuminoso = Material::where('slug', 'luminoso')->first();

        $luminaria = Product::create([
            'category_id' => $categoriaLuminarias->id,
            'material_id' => $materialLuminoso->id,
            'name' => 'Luminária LED Nuvem',
            'slug' => 'luminaria-led-nuvem',
            'description' => 'Luminária decorativa em formato de nuvem com iluminação LED suave. Perfeita para quartos infantis, quartos de casal ou qualquer ambiente que precise de um toque delicado e aconchegante. Funciona com pilhas ou USB.',
            'short_description' => 'Luminária LED decorativa em formato de nuvem',
            'is_active' => true,
            'is_featured' => true,
        ]);

        $sizeUnico = ProductSize::create([
            'product_id' => $luminaria->id,
            'size' => 'Único',
            'shape' => 'Nuvem',
            'weight' => 200,
            'width' => 25,
            'height' => 15,
            'length' => 10,
            'is_active' => true,
        ]);

        $coresLuminaria = [
            ['color' => 'Branca', 'finish' => 'Luz Branca Fria', 'price' => 159.90, 'stock' => 20],
            ['color' => 'Rosa', 'finish' => 'Luz Branca Quente', 'price' => 159.90, 'stock' => 15],
            ['color' => 'Azul', 'finish' => 'RGB Multicolor', 'price' => 189.90, 'stock' => 12],
        ];

        foreach ($coresLuminaria as $index => $cor) {
            $item = ProductItem::create([
                'product_id' => $luminaria->id,
                'product_size_id' => $sizeUnico->id,
                'sku' => 'LUM-NUV-' . strtoupper(substr($cor['color'], 0, 3)),
                'color' => $cor['color'],
                'finish' => $cor['finish'],
                'price' => $cor['price'],
                'supplier_price' => $cor['price'] * 0.55,
                'stock_quantity' => $cor['stock'],
                'min_stock' => 5,
                'is_active' => true,
                'is_launch' => $index === 2, // RGB é lançamento
            ]);

            ProductItemImage::create([
                'product_item_id' => $item->id,
                'path' => 'products/luminaria-nuvem-' . strtolower($cor['color']) . '.jpg',
                'alt_text' => 'Luminária LED Nuvem ' . $cor['color'] . ' - ' . $cor['finish'],
                'order' => 0,
                'is_primary' => true,
            ]);
        }

        $this->command->info('✅ Luminária LED Nuvem criada com 3 variantes');

        // ========================================
        // 3. CANECA ESMALTADA (para o bundle)
        // ========================================

        $categoriaUtilitarios = Category::where('slug', 'utilitarios')->first();
        $subcategoriaCanecas = Category::where('slug', 'canecas')->first();
        $materialCeramica = Material::where('slug', 'ceramica')->first();

        $caneca = Product::create([
            'category_id' => $subcategoriaCanecas->id ?? $categoriaUtilitarios->id,
            'material_id' => $materialCeramica->id,
            'name' => 'Caneca Esmaltada Vintage',
            'slug' => 'caneca-esmaltada-vintage',
            'description' => 'Caneca em cerâmica com acabamento esmaltado vintage. Capacidade de 300ml, ideal para café, chá ou chocolate quente.',
            'short_description' => 'Caneca esmaltada 300ml',
            'is_active' => true,
        ]);

        $sizeCaneca = ProductSize::create([
            'product_id' => $caneca->id,
            'size' => '300ml',
            'weight' => 250,
            'width' => 8,
            'height' => 10,
            'length' => 12,
            'is_active' => true,
        ]);

        $canecaBranca = ProductItem::create([
            'product_id' => $caneca->id,
            'product_size_id' => $sizeCaneca->id,
            'sku' => 'CAN-300-BRA',
            'color' => 'Branca',
            'price' => 49.90,
            'supplier_price' => 29.90,
            'stock_quantity' => 50,
            'min_stock' => 10,
            'is_active' => true,
        ]);

        ProductItemImage::create([
            'product_item_id' => $canecaBranca->id,
            'path' => 'products/caneca-branca-300ml.jpg',
            'alt_text' => 'Caneca Esmaltada Vintage Branca 300ml',
            'order' => 0,
            'is_primary' => true,
        ]);

        $this->command->info('✅ Caneca Esmaltada criada');

        // ========================================
        // 4. BULE DE CERÂMICA (para o bundle)
        // ========================================

        $bule = Product::create([
            'category_id' => $categoriaUtilitarios->id,
            'material_id' => $materialCeramica->id,
            'name' => 'Bule de Cerâmica',
            'slug' => 'bule-ceramica',
            'description' => 'Bule em cerâmica branca com capacidade para 1 litro. Design clássico e elegante.',
            'short_description' => 'Bule cerâmica 1 litro',
            'is_active' => true,
        ]);

        $sizeBule = ProductSize::create([
            'product_id' => $bule->id,
            'size' => '1L',
            'weight' => 600,
            'width' => 15,
            'height' => 18,
            'length' => 20,
            'is_active' => true,
        ]);

        $buleBranco = ProductItem::create([
            'product_id' => $bule->id,
            'product_size_id' => $sizeBule->id,
            'sku' => 'BULE-1L-BRA',
            'color' => 'Branco',
            'price' => 89.90,
            'supplier_price' => 54.90,
            'stock_quantity' => 30,
            'min_stock' => 5,
            'is_active' => true,
        ]);

        ProductItemImage::create([
            'product_item_id' => $buleBranco->id,
            'path' => 'products/bule-branco-1l.jpg',
            'alt_text' => 'Bule de Cerâmica Branco 1L',
            'order' => 0,
            'is_primary' => true,
        ]);

        $this->command->info('✅ Bule de Cerâmica criado');
    }
}
