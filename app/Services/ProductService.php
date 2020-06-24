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
		$data['slug'] = Str::slug($data['name']);

		return (new ProductRepository())->store($data);
	}

	/**
	 * Altera o status do cadastro para concluido
	 *
	 * @param integer $productId
	 * @return \App\Models\Product
	 */
	public static function complete($productId)
	{
		// cria uma slug
		$data = [
			'id'   => $productId,
			'done' => config('constants.STATUS_ACTIVE'),
		];

		return (new ProductRepository())->store($data);
	}

	/**
	 * Recupera o nome completo do produto (mais o tamanho)
	 *
	 * @param integer $productId
	 * @param integer $productSizeId
	 * @param integer $itemId
	 * @return array
	 */
	// public static function getInfos($productId, $productSizeId = null, $itemId = null)
	// {
	// 	// recupera as informacoes do produto
	// 	$product = (new ProductRepository())->findById($productId);
	// 	// recupera as informacoes de um tamanho expecifico
	// 	if (!empty($productSizeId)) {
	// 		$sizes = $product->sizes->where('id', $productSizeId);
	// 	}
	// 	// recupera as informacoes de um item de um tamanho expecifico
	// 	if (!empty($itemId)) {
	// 		$items = $product->sizes->items->where('id', $itemId);
	// 	}

	// 	return [
	// 		'product' => $product,
	// 		'sizes'   => $sizes ?? null,
	// 		'items'   => $items ?? null,
	// 	];
	// }
}
