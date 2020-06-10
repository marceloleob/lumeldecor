<?php

namespace App\Services;

use App\Models\Item;
use App\Models\ItemTheme;
use App\Models\ItemTone;
use App\Repositories\ItemRepository;
use App\Repositories\ItemThemeRepository;
use App\Repositories\ItemToneRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductSizeRepository;
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
		$items->tones      = self::format($items->tones);
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
	 * @param ProductSize $productSize
	 * @param Tone        $tones
	 * @return string
	 */
	public static function handleCode($product, $productSize, $tones)
	{
		// forca os codigos das cores terem 2 numeros
		$tones->transform(function ($item) {
			return str_pad($item, 2, '0', STR_PAD_LEFT);
		});
		// mescla os codigos (3 codigos no maximo)
		$flattened = $tones->flatten()->implode('');

		$materialCode = str_pad($product->category->material->id, 2, '0', STR_PAD_LEFT);
		$categoryCode = str_pad($product->category->id, 2, '0', STR_PAD_LEFT);
		$productCode  = str_pad($product->id, 5, '0', STR_PAD_LEFT);
		$colorCode    = str_pad($flattened, 6, '0', STR_PAD_LEFT);
		$sizeCode     = str_pad($productSize->size, 2, '0', STR_PAD_LEFT);

		return 'LM' . $materialCode . $categoryCode . $productCode . $colorCode . $sizeCode;
	}

	/**
	 * Gerencia o metodo create e update dos itens do produto
	 *
	 * @param  array   $data
	 * @param  integer $itemId
	 * @return \App\Models\Item
	 */
    public static function store($data = [], $itemId = null)
    {
		// recupera uma instancia do produto pai
		$product = (new ProductRepository)->findById($data['product_id']);
		// recupera uma instancia do tamanho do produto pai
		$productSize = (new ProductSizeRepository)->findById($data['product_size_id']);

		// atualiza os dados do Item
		$data['code']    = self::handleCode($product, $productSize, $data['colors']);
		$data['picture'] = ImageService::store($data['picture'], $data['new_picture'] ?? null, $itemId ?? null);
		$data['launch']  = $data['launch'] ?? false;

		// salva ou atualiza os dados
		$itemR = new ItemRepository();
		$itemE = $itemR->store($data);
		// verifica se salvou
		if (!$itemE instanceof Item) {
			throw new Exception($itemE, 1);
		}

		// exclui todas as cores deste item
		ItemTone::where('item_id', $itemE->id)->delete();
		// salva a(s) cor(es) do item (array)
		foreach ($data['colors'] as $toneId) {
			$dataColor = [
				'item_id' => $itemE->id,
				'tone_id' => (int) $toneId,
			];
			$itemColorR = new ItemToneRepository();
			$itemColorE = $itemColorR->store($dataColor);
			// verifica se salvou
			if (!$itemColorE instanceof ItemTone) {
				throw new Exception($itemColorE, 1);
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
				$itemThemeE = $itemThemeR->store($dataTheme);
				// verifica se salvou
				if (!$itemThemeE instanceof ItemTheme) {
					throw new Exception($itemThemeE, 1);
				}
			}
		}

		return $itemE;
	}
}
