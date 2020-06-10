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
	 * @param integer $itemId
	 * @param integer $productId
	 * @param integer $productSizeId
	 * @return Entity
	 */
	public static function findById($itemId = null, $productId, $productSizeId)
	{
		$repository = new ItemRepository();

		// verifica se esta editando
		if (!empty($itemId)) {
			// recupera o item pelo proprio codigo
			$items = $repository->findById($itemId);
		} else {
			// recupera o item pelo produto e tamanho
			$items = $repository->findByParentsId($productId, $productSizeId);
		}
		// retorna nulo caso nao tenha encontrado nada
		if (empty($items)) {
			return null;
		}

		$items->product_id = $items->productSize->product->id;
		$items->tones      = self::format($items->tones);
		$items->themes     = self::format($items->themes);
		$items->profit     = self::profit($items);

		return $items;
	}

	/**
	 * Percorre a Collection e customiza dados para imprimir na view como array e somente com o ID
	 *
	 * @param Collection $collection
	 * @return array
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
	 * Formata o total de lucro que pode ter no item
	 *
	 * @param Collection $collection
	 * @return string
	 */
	public static function profit($collection)
	{
		$class  = 'success';

		$sPrice = (float) $collection->s_price;
		$pPrice = (float) $collection->p_price;

		$gross  = ($sPrice - $pPrice);
		$profit = (($gross * 100) / $pPrice);

		// verifica se o lucro foi bom ou ruim
		if ($profit <= 10) {
			$class = 'danger';
		}
		if ($profit > 10 && $profit < 100) {
			$class = 'warning';
		}

		return '<span class="text-' . $class . '">' . number_format($profit, 2, ',', '.') . '% de lucro</span>';
	}

	/**
	 * Recupera as informacoes referente ao produto e ao tamanho do produto deste item
	 *
	 * @param integer $productId
	 * @param integer $productSizeId
	 * @return array
	 */
	public static function getInfos($productId, $productSizeId)
	{
		$items = (new ItemRepository())->findByParentsId($productId, $productSizeId);

		return [
			'productId'       => $items->productSize->product->id,
			'productName'     => $items->productSize->product->name,
			'productSizeId'   => $items->productSize->id,
			'productSizeName' => $items->productSize->size,
		];
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

		// verifica se esta criando um novo ou atualizando
		if (empty($itemId)) {
			// salva o Stock deste item
			StockService::update(
				$data['product_id'],
				$itemE->id,
				StockService::$_reason['NEW_ITEM'],
				$data['amount'],
				StockService::$_actions['INCOMING']
			);
		}

		// atualiza o produto para (cadastro completo)
		ProductService::complete($data['product_id']);

		return $itemE;
	}
}
