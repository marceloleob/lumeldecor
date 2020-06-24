<?php

namespace App\Services;

use App\Repositories\ProductSizeRepository;

class ProductSizeService
{
	/**
	 * Gerencia o metodo create e update do tamanho dos produtos
	 *
	 * @param  array   $data
	 * @param  integer $productSizeId
	 * @return \App\Models\ProductSize
	 */
    public static function store($data = [], $productSizeId = null)
    {
		// instancia o repositorio
		$repository = new ProductSizeRepository();
		// verifica se o tamanho ja foi adicionado
		if (empty($productSizeId) && $repository->validateNewSize($data['product_id'], $data['size']) === false) {
			return ['message' => 'Este tamanho não pode ser adicionado, favor adicionar outro tamanho.'];
		}

		return $repository->store($data);
	}

	/**
	 * Formata os tamanhos para renderizar no site
	 *
	 * @param \App\Models\ProductSize
	 * @return array
	 */
	public static function formatWebSite($sizes)
	{
		$array = [];

		foreach ($sizes as $size) {
			// verifica se existe informacoes do item para este tamanho
			if (count($size->items->toArray())) {
				$array[$size->size] = ItemService::formatWebSite($size->items);
			}
		}

		return $array;
	}
}
