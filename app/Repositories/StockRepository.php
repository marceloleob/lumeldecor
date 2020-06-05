<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Stock::class;



	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $productId
	 * @param integer $itemId
	 * @return Entity
	 */
	public function getBalance($productId, $itemId)
	{
		return $this->query()
			->where('product_id', $productId)
			->where('item_id', $itemId)
			->firstOrFail();
	}
}
