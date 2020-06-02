<?php

namespace App\Services;

use App\Models\ItemColor;
use App\Models\ItemTheme;
use App\Repositories\ItemColorRepository;
use App\Repositories\ItemRepository;
use App\Repositories\ItemThemeRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductSizeRepository;
use Illuminate\Support\Facades\DB;

use Exception;

class ItemService
{
	/**
	 * Retorna os dados FORMATADO "belongsToMany" referente a este modelo
	 *
	 * @param integer $id
	 * @return Entity
	 */
	public static function findById($id)
	{
		$item  = new ItemRepository();
		$items = $item->findById($id);

		$items->product_id = $items->productSize->product->id;
		$items->colors     = self::format($items->colors);
		$items->themes     = self::format($items->themes);

		return $items;
	}

	/**
	 * Percorre a Collection e customiza dados para imprimir na view como array e somente com o ID
	 *
	 * @return Collection
	 */
	public static function format($collection)
	{
		$array = [];
		foreach ($collection as $model) {
			$array[] = $model->id;
		}
		return $array;
	}

	/**
	 * Cria um codigo unico para cada item de produto
	 *
	 * @param Product     $product
	 * @param ProductSize $productSizeE
	 * @param integer     $colorId
	 * @return string
	 */
	public static function handleCode($product, $productSizeE, $colors)
	{
		// forca os codigos das cores terem 2 numeros
		$colors->transform(function ($item) {
			return str_pad($item, 2, '0', STR_PAD_LEFT);
		});
		// mescla os codigos (3 codigos no maximo)
		$flattened = $colors->flatten()->implode('');

		$materialCode = str_pad($product->category->material->id, 2, '0', STR_PAD_LEFT);
		$categoryCode = str_pad($product->category->id, 2, '0', STR_PAD_LEFT);
		$productCode  = str_pad($product->id, 5, '0', STR_PAD_LEFT);
		$colorCode    = str_pad($flattened, 6, '0', STR_PAD_LEFT);
		$sizeCode     = str_pad($productSizeE->size, 2, '0', STR_PAD_LEFT);

		return 'LM' . $materialCode . $categoryCode . $productCode . $colorCode . $sizeCode;
	}

	/**
	 * Gerencia o metodo update dos produtos
	 *
	 * @param  array $data
	 * @return void
	 */
    public static function update($data = [])
    {
        // inicia o acoplamento de uma transacao
		DB::beginTransaction();

        try {
			// recupera uma instancia do produto pai
			$product = (new ProductRepository)->findById($data['product_id']);
			// recupera uma instancia do tamanho do produto pai
			$productSize = (new ProductSizeRepository)->findById($data['product_size_id']);

			// atualiza os dados do Item
			$dataItem = [
				'id'              => $data['id'],
				'product_size_id' => $data['product_size_id'],
				'supplier_id'     => $data['supplier_id'],
				'code'            => self::handleCode($product, $productSize, $data['colors']),
				'picture'         => ImageService::update($data['picture'], $data['new_picture'] ?? null),
				'p_price'         => $data['p_price'],
				's_price'         => $data['s_price'],
				'launch'          => $data['launch'] ?? false,
				'status'          => $data['status'],
			];
			$itemR = new ItemRepository();
			$itemE = $itemR->store($dataItem, true);
			// verifica se salvou
			if (! isset($itemE->id)) {
				throw new Exception($itemE);
			}

			// exclui todas as cores deste item
			ItemColor::where('item_id', $itemE->id)->delete();
			// salva a(s) cor(es) do item (array)
			foreach ($data['colors'] as $colorId) {
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
			if (isset($data['themes']) === true) {
				// exclui todos os temas dete item
				ItemTheme::where('item_id', $itemE->id)->delete();
				// salva o(s) tema(s) do item (array)
				foreach ($data['themes'] as $themeId) {
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

            // efetiva a transacao
            DB::commit();
            // retorna a entidade criada ou atualizada
            return ['success' => 'Item do produto foi atualizado com sucesso!'];

        } catch (Exception $exception) {
            // descarta a transacao
            DB::rollback();
            // retorna o erro
            return [
                'danger' => 'Erro ao atualizar o item do produto produto, tente novamente!',
                'error'  => $exception,
            ];
		}
	}
}
