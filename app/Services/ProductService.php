<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ItemColorRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ItemThemeRepository;
use App\Repositories\ProductInfoRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;




class ProductService
{
	/**
	 * Monta o SLUG do produto
	 *
	 * @param ProductInfo $productInfo
	 * @param string  $productSize
	 * @return string $slug
	 */
	public static function handleSlug($productInfo, $productSize)
	{
		return Str::slug($productInfo->category->name . ' ' . $productInfo->name . ' ' . $productInfo->category->material->name . ' ' . $productSize);
	}

	/**
	 * Cria um codigo unico para cada item de produto
	 *
	 * @param Product $product
	 * @param integer $colorId
	 * @return string
	 */
	public static function handleCode($product, $colors)
	{
		// forca os codigos das cores terem 2 numeros
		$colors->transform(function ($item) {
			return str_pad($item, 2, '0', STR_PAD_LEFT);
		});
		// mescla os codigos (3 codigos no maximo)
		$flattened = $colors->flatten()->implode('');

		$materialCode = str_pad($product->info->category->material->id, 2, '0', STR_PAD_LEFT);
		$categoryCode = str_pad($product->info->category->id, 2, '0', STR_PAD_LEFT);
		$productCode  = str_pad($product->id, 5, '0', STR_PAD_LEFT);
		$colorCode    = str_pad($flattened, 6, '0', STR_PAD_LEFT);
		$sizeCode     = str_pad($product->size, 2, '0', STR_PAD_LEFT);

		return 'LM' . $materialCode . $categoryCode . $productCode . $colorCode . $sizeCode;
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
				'featured'    => $data['featured'] ?? false,
			];
			$productInfoRepository = new ProductInfoRepository();
			$productInfoRepository = $productInfoRepository->store($dataProductInfo)['entity'];
			// $productInfoRepository = (isset($productInfoRepository['entity'])) ? $productInfoRepository['entity'] : dd($productInfoRepository, $dataProductInfo);

			// percorre todos os tamanhos "produtos" (array)
			foreach ($data['product'] as $product) {
				// 2º) Salva o Product
				$dataProduct = [
					'product_info_id' => $productInfoRepository->id,
					'slug'            => self::handleSlug($productInfoRepository, $product['size']),
					'size'            => $product['size'],
					'weight'          => $product['weight'],
					'height'          => $product['height'],
					'width'           => $product['width'],
					'length'          => $product['length'],
				];
				$productRepository = new ProductRepository();
				$productRepository = $productRepository->store($dataProduct)['entity'];
				// $productRepository = (isset($productRepository['entity'])) ? $productRepository['entity'] : dd($productRepository, $dataProduct);

				// precorre todos os itens referentes a este tamanho "produtos" (array)
				foreach ($product['item'] as $item) {
					// 3º) Salva os Items (array)
					$dataItem = [
						'product_id'  => $productRepository->id,
						'supplier_id' => $item['supplier_id'],
						'code'        => self::handleCode($productRepository, $item['colors']),
						'image'       => ImageService::save($item['photo']),
						'p_price'     => $item['p_price'],
						's_price'     => $item['s_price'],
						'launch'      => $item['launch'] ?? false,
					];
					$itemRepository = new ItemRepository();
					$itemRepository = $itemRepository->store($dataItem)['entity'];

					// 4º) Salva a(s) cor(es) do item (array)
					foreach ($item['colors'] as $colorId) {
						$dataColor = [
							'item_id'  => $itemRepository->id,
							'color_id' => (int) $colorId,
						];
						$itemColorRepository = new ItemColorRepository();
						$itemColorRepository->store($dataColor);
					}
					// 4º) Salva o(s) tema(s) do item (array)
					foreach ($item['themes'] as $themeId) {
						$dataTheme = [
							'item_id'  => $itemRepository->id,
							'theme_id' => (int) $themeId,
						];
						$itemThemeRepository = new ItemThemeRepository();
						$itemThemeRepository->store($dataTheme);
					}

					// 6º) Salva o Stock de cada item (array)
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
					$stockRepository->store($dataStock);
				}
			}

            // efetiva a transacao
            DB::commit();
            // retorna a entidade criada ou atualizada
            return [
                'success' => 'Produto cadastrado com sucesso!',
                'entity'  => true,
            ];

        } catch (Exception $exception) {
            // descarta a transacao
            DB::rollback();
            // retorna o erro
            return [
                'danger' => 'Erro ao cadastrar o produto, tente novamente!',
                'error'  => $exception,
            ];
		}

	}
}
