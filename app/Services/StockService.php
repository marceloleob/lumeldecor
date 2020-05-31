<?php

namespace App\Services;

use App\Repositories\StockRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StockService
{
	/**
	 * Armazena as acoes de manipulacao do estoque
	 */
	public static $_actions = [
		'NEW_PRODUCT' => 'Cadastro de novo produto',
	];

	/**
	 * Recupera a quantidade total do item + a quantidade adicionada
	 *
	 * @param integer $productId
	 * @param integer $itemId
	 * @param integer $amount
	 * @return integer
	 */
	public static function getNewBalace($productId, $itemId, $amount)
	{
		try {
			$stock = new StockRepository();
			$stock = $stock->getBalance($productId, $itemId);

			return $stock->incoming + $amount;

		} catch (ModelNotFoundException $exception) {

			return $amount;
		}
	}
}
