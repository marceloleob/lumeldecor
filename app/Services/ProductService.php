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
			foreach ($data['sizes'] as $sizes) {
				// seta o produto
				$sizes['product_id'] = $productE->id;
				// 2º) Salva os dados do Tamanho do Produto
				$productSizeE = ProductSizeService::store($sizes);

				// precorre todos os itens referentes a este tamanho (array)
				foreach ($sizes['item'] as $item) {
					// seta os ids
					$item['product_id']      = $productE->id;
					$item['product_size_id'] = $productSizeE->id;
					// 3º) Salva os Items, Cores e Temas
					$itemE = ItemService::store($item);

					// seta os ids
					$item['item_id'] = $itemE->id;
					// 4º) Salva o Stock de cada item
					StockService::create($item);
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
