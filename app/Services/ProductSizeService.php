<?php

namespace App\Services;

use App\Models\ProductSize;
use App\Repositories\ProductSizeRepository;
use Illuminate\Support\Arr;
use Exception;

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
		// remove do array o parametro que nao e necessario
		if (isset($data['item'])) {
			$data = Arr::except($data, ['item']);
		}

		// instancia o repositorio
		$repository = new ProductSizeRepository();
		// verifica se o tamanho ja foi adicionado
		if (empty($productSizeId) && $repository->validateNewSize($data['product_id'], $data['size']) === false) {
			return [
				'danger' => 'Este tamanho não pode ser adicionado, favor adicionar outro tamanho.',
				'error'  => 'size',
			];
		}

		// salva ou atualiza os dados
		$entity = $repository->store($data, true);
		// verifica se salvou
		if (!$entity instanceof ProductSize) {
			throw new Exception($entity, 1);
		}

		return $entity;
	}
}
