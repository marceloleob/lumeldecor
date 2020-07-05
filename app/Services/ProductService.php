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
			'done' => config('constants.DONE.ACTIVE'),
		];

		return (new ProductRepository())->store($data);
	}
}
