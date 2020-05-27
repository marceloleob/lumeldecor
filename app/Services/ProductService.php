<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ProductInfoRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use App\Repositories\ThemeItemRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;




class ProductService
{
	/**
	 * Monta o SLUG do produto
	 *
	 * @param integer $categoryId
	 * @param string  $productName
	 * @param string  $productSize
	 * @return string $slug
	 */
	public static function handleSlug($categoryId, $productName, $productSize)
	{
		$category = new CategoryRepository();
		$category = $category->findById($categoryId);

		return Str::slug($category->name . ' ' . $productName . ' de ' . $category->material->name . ' ' . $productSize);
	}

	/**
	 * Cria um codigo unico para cada item de produto
	 *
	 * @param Product $product
	 * @param integer $colorId
	 * @return string
	 */
	public static function handleCode($product, $colorId)
	{
		$materialCode = str_pad($product->info->category->material->id, 2, '0', STR_PAD_LEFT);
		$categoryCode = str_pad($product->info->category->id, 2, '0', STR_PAD_LEFT);
		$productCode  = str_pad($product->id, 6, '0', STR_PAD_LEFT);
		$colorCode    = str_pad($colorId, 2, '0', STR_PAD_LEFT);
		$sizeCode     = str_pad($product->size, 2, '0', STR_PAD_LEFT);

		return $materialCode . $categoryCode . $productCode . $colorCode . $sizeCode;
	}

	/**
	 * Gerencia o metodo save e update dos produtos
	 *
	 * @param array $data
	 * @return void
	 */
    public static function store($data = [])
    {
        // inicia o acoplamento de uma transacao
        DB::beginTransaction();

        try {
			// 1º) Salva o ProductInfo
			$dataProductInfo = [
				'category_id' => $data['category_id'],
				'name'        => $data['name'],
				'description' => $data['description'],
				'hashtag'     => $data['hashtag'],
				'featured'    => $data['featured'],
			];
			$productInfoRepository = new ProductInfoRepository();
			$productInfoRepository = $productInfoRepository->store($dataProductInfo)['entity'];

			// percorre todos os tamanhos "produtos" (array)
			foreach ($data['product'] as $product) {
				// 2º) Salva o Product
				$dataProduct = [
					'product_info_id' => $productInfoRepository->id,
					'slug'            => self::handleSlug($data['category_id'], $data['name'], $product['size']),
					'size'            => $product['size'],
					'weight'          => $product['weight'],
					'height'          => $product['height'],
					'width'           => $product['width'],
					'length'          => $product['length'],
				];
				$productRepository = new ProductRepository();
				$productRepository = $productRepository->store($dataProduct)['entity'];

				// precorre todos os itens referentes a este tamanho "produtos" (array)
				foreach ($product['item'] as $item) {
					// 3º) Salva os Items (array)
					$dataItem = [
						'product_id'  => $productRepository->id,
						'supplier_id' => $item['supplier_id'],
						'color_id'    => $item['color_id'],
						'code'        => self::handleCode($productRepository, $item['color_id']),
						'image'       => ImageService::save($item['photo']),
						'p_price'     => $item['p_price'],
						's_price'     => $item['s_price'],
						'launch'      => $item['launch'] || false,
					];
					$itemRepository = new ItemRepository();
					$itemRepository = $itemRepository->store($dataItem)['entity'];

// 					// 4º) Salva o(s) ThemeItem (array)
// 					foreach (explode('|', $item['theme']) as $theme) {
// dd($theme);
// 						$dataTheme = [
// 							'theme_id' => $theme,
// 							'item_id'  => $itemRepository->id,
// 						];
// 						$themeItem = new ThemeItemRepository();
// 						$themeItem = $themeItem->store($dataTheme);
// 					}

					// 5º) Salva o Stock de cada item (array)
					$dataStock = [
						'product_id' => $productRepository->id,
						'item_id'    => $itemRepository->id,
						'user_id'    => UserService::getUserIdAuth(),
						'action'     => StockService::$_actions['NEW_PRODUCT'],
						'incoming'   => $item['amount'],
						'overdraw'   => null,
						'balance'    => StockService::getNewBalace($productRepository->id, $itemRepository->id, $item['amount'])
					];
					$stockRepository = new StockRepository();
					$stockRepository = $stockRepository->store($dataStock)['entity'];
				}
			}

            // efetiva a transacao
            DB::commit();
            // retorna a entidade criada ou atualizada
            return [
                'success' => ((isset($data['id'])) ? 'Atualizado' : 'Cadastrado') . ' com sucesso!',
                'entity'  => true,
            ];

        } catch (Exception $exception) {
			dd($exception);
            // descarta a transacao
            DB::rollback();
            // retorna o erro
            return [
                'danger' => 'Erro ao ' . (isset($data['id']) ? 'atualizar' : 'cadastrar') . ', tente novamente!',
                'error'  => $exception,
            ];
		}

	}
}
