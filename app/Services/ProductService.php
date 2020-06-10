<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Str;

class ProductService
{
	/**
	 * Gerencia o metodo save e update dos produtos
	 *
	 * @param array   $data
	 * @param integer $productId
	 * @return \App\Models\Product
	 */
    public static function store($data = [], $productId = null)
    {
		// cria uma slug
		$data['slug']   = Str::slug($data['name']);

		return (new ProductRepository())->store($data);
	}

	/*
	 * Gerencia o metodo create dos produtos
	 *
	 * @param array $data
	 * @return void
	 *
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
			$productE = $productR->store($dataProduct);
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
	*/
}
