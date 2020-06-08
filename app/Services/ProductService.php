<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class ProductService
{
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
				'material_id' => $data['material_id'],
				'category_id' => $data['category_id'],
				'name'        => $data['name'],
				'slug'        => Str::slug($data['name']),
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

					// 4º) Salva o Stock de cada item
					StockService::update(
						$productE->id,
						$itemE->id,
						StockService::$_reason['NEW_ITEM'],
						$item['amount'],
						StockService::$_actions['INCOMING']
					);
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
				'material_id' => $data['material_id'],
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
