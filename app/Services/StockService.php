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
