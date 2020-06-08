<?php

namespace App\Services;

use App\Models\Stock;
use App\Repositories\StockRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Exception;

class StockService
{
	/**
	 * Armazena as acoes de manipulacao do estoque
	 *
	 */
	public static $_actions = [
		'INCOMING' => 'I',
		'OVERDRAW' => 'O',
	];

	/**
	 * Armazena as acoes de manipulacao do estoque
	 *
	 */
	public static $_reason = [
		'NEW_ITEM'           => 1,
		'RESTOCK'            => 2,
		'CANCELLED_PURCHASE' => 3,
		'RETURNED_PURCHASE'  => 4,
		'SOLD_STORE'         => 5,
		'SOLD_WEBSITE'       => 6,
		'SOLD_INSTAGRAM'     => 7,
		'SOLD_FACEBOOK'      => 8,
		'RETURNED_SUPPLIER'  => 9,
	];

	/**
	 * Recupera a quantidade total do item + a quantidade adicionada
	 *
	 * @param integer $productId
	 * @param integer $itemId
	 * @param integer $amount
	 * @param string $action
	 * @return integer
	 */
	public static function getNewBalace($productId, $itemId, $amount, $action)
	{
		try {
			$stock = new StockRepository();
			$stock = $stock->getBalance($productId, $itemId);

			if ($action === self::$_actions['INCOMING']) {
				return $stock->incoming + $amount;
			}

			if ($action === self::$_actions['OVERDRAW']) {
				return $stock->incoming - $amount;
			}

		} catch (ModelNotFoundException $exception) {

			return $amount;
		}
	}

	/**
	 * Adiciona quantidade para um item
	 *
	 * @param integer $productId
	 * @param integer $itemId
	 * @param integer $reasonId
	 * @param integer $amount
	 * @return \App\Models\Stock
	 */
    public static function update($productId, $itemId, $reasonId, $amount, $action)
    {
		$data = [
			'product_id' => $productId,
			'item_id'    => $itemId,
			'user_id'    => UserService::getUserIdAuth(),
			'reason_id'  => $reasonId,
			'action'     => $action,
			'incoming'   => $amount,
			'overdraw'   => null,
			'balance'    => self::getNewBalace($productId, $itemId, $amount, $action),
		];

		// salva ou atualiza os dados
		$repository = new StockRepository();
		$entity = $repository->store($data);
		// verifica se salvou
		if (!$entity instanceof Stock) {
			throw new Exception($entity, 1);
		}

		return $entity;
	}
}
