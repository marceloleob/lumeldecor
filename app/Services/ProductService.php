<?php

namespace App\Services;

use App\Repositories\ItemColorRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ItemThemeRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductSizeRepository;
use App\Repositories\StockRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class ProductService
{
	/**
	 * Monta o SLUG do produto
	 *
	 * @param string  $name
	 * @return string $slug
	 */
	public static function handleSlug($name)
	{
		return Str::slug($name);
		// return Str::slug($product->category->name . ' ' . $product->name . ' ' . $product->category->material->name . ' ' . $productSize);
	}

	/**
	 * Gerencia o metodo create dos produtos
	 *
	 * @param array $data
	 * @return void
	 */
    public static function create($data = [])
    {
        // inicia o acoplamento de uma transacao
        DB::beginTransaction();

        try {
			// 1º) Salva o Product
			$dataProduct = [
				'category_id' => $data['category_id'],
				'name'        => $data['name'],
				'slug'        => self::handleSlug($data['name']),
				'picture'     => $data['picture'] ?? null,
				'description' => $data['description'],
				'hashtag'     => $data['hashtag'],
				'featured'    => $data['featured'] ?? false,
				'launch'      => $data['launch'] ?? false,
			];
			$productR = new ProductRepository();
			$productE = $productR->store($dataProduct, true);
			// verifica se salvou
			if (! isset($productE->id)) {
				throw new Exception($productE);
			}

			// percorre todos os tamanhos do produto (array)
			foreach ($data['product'] as $product) {
				// 2º) Salva o Product
				$dataProductSize = [
					'product_id' => $productE->id,
					'size'       => $product['size'],
					'weight'     => $product['weight'],
					'shape'      => $product['shape'],
					'pro_length' => $product['pro_length'],
					'pro_width'  => $product['pro_width'],
					'pro_height' => $product['pro_height'],
					'shi_length' => $product['shi_length'],
					'shi_width'  => $product['shi_width'],
					'shi_height' => $product['shi_height'],
				];
				$productSizeR = new ProductSizeRepository();
				$productSizeE = $productSizeR->store($dataProductSize, true);
				// verifica se salvou
				if (! isset($productSizeE->id)) {
					throw new Exception($productSizeE);
				}

				// precorre todos os itens referentes a este tamanho (array)
				foreach ($product['item'] as $item) {
					// 3º) Salva os Items (array)
					$dataItem = [
						'product_size_id' => $productSizeE->id,
						'supplier_id'     => $item['supplier_id'],
						'code'            => ItemService::handleCode($productE, $productSizeE, $item['colors']),
						'picture'         => ImageService::save($item['picture']),
						'p_price'         => $item['p_price'],
						's_price'         => $item['s_price'],
						'launch'          => $item['launch'] ?? false,
					];
					$itemR = new ItemRepository();
					$itemE = $itemR->store($dataItem, true);
					// verifica se salvou
					if (! isset($itemE->id)) {
						throw new Exception($itemE);
					}

					// 4º) Salva a(s) cor(es) do item (array)
					foreach ($item['colors'] as $colorId) {
						$dataColor = [
							'item_id'  => $itemE->id,
							'color_id' => (int) $colorId,
						];
						$itemColorR = new ItemColorRepository();
						$itemColorE = $itemColorR->store($dataColor, true);
						// verifica se salvou
						if (! isset($itemColorE->id)) {
							throw new Exception($itemColorE);
						}
					}

					// verifica se foi informado algum Tema (nao obrigatorio)
					if (isset($item['themes']) === true) {
						// 5º) Salva o(s) tema(s) do item (array)
						foreach ($item['themes'] as $themeId) {
							$dataTheme = [
								'item_id'  => $itemE->id,
								'theme_id' => (int) $themeId,
							];
							$itemThemeR = new ItemThemeRepository();
							$itemThemeE = $itemThemeR->store($dataTheme, true);
							// verifica se salvou
							if (! isset($itemThemeE->id)) {
								throw new Exception($itemThemeE);
							}
						}
					}

					// 6º) Salva o Stock de cada item (array)
					$dataStock = [
						'product_id' => $productE->id,
						'item_id'    => $itemE->id,
						'user_id'    => UserService::getUserIdAuth(),
						'action'     => StockService::$_actions['NEW_PRODUCT'],
						'incoming'   => $item['amount'],
						'overdraw'   => null,
						'balance'    => StockService::getNewBalace($productE->id, $itemE->id, $item['amount'])
					];
					$stockR = new StockRepository();
					$stockE = $stockR->store($dataStock, true);
					// verifica se salvou
					if (! isset($stockE->id)) {
						throw new Exception($stockE);
					}
				}
			}

            // efetiva a transacao
            DB::commit();
            // retorna a entidade criada ou atualizada
            return ['success' => 'Produto cadastrado com sucesso!'];

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

	/**
	 * Gerencia o metodo update dos produtos
	 *
	 * @param array $data
	 * @return void
	 */
    public static function update($data = [])
    {
        // inicia o acoplamento de uma transacao
        DB::beginTransaction();

        try {
			// 1º) Salva o Product
			$dataProduct = [
				'id'          => $data['id'],
				'category_id' => $data['category_id'],
				'name'        => $data['name'],
				'slug'        => Str::slug($data['name']),
				'picture'     => $data['picture'] ?? null,
				'description' => $data['description'],
				'hashtag'     => $data['hashtag'],
				'featured'    => $data['featured'] ?? false,
				'launch'      => $data['launch'] ?? false,
				'status'      => $data['status'],
			];
			$productR = new ProductRepository();
			$productE = $productR->store($dataProduct, true);
			// verifica se salvou
			if (! isset($productE->id)) {
				throw new Exception($productE);
			}

            // efetiva a transacao
            DB::commit();
            // retorna a entidade criada ou atualizada
            return ['success' => 'Produto atualizado com sucesso!'];

        } catch (Exception $exception) {
            // descarta a transacao
            DB::rollback();
            // retorna o erro
            return [
                'danger' => 'Erro ao atualizar o produto, tente novamente!',
                'error'  => $exception,
            ];
		}
	}
}
