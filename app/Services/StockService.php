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


	/**
	 * Gerencia o metodo create e update do tamanho dos produtos
	 *
	 * @param  array   $data
	 * @return \App\Models\Stock
	 */
    public static function create($data = [])
    {
		// recupera a quantidade
		$incoming = $data['amount'];
		// remove do array o parametro que nao e necessario
		$data = Arr::only($data, ['product_id', 'item_id']);

		$data['user_id']  = UserService::getUserIdAuth();
		$data['action']   = self::$_actions['NEW_PRODUCT'];
		$data['incoming'] = $incoming;
		$data['overdraw'] = null;
		$data['balance']  = self::getNewBalace($data['product_id'], $data['item_id'], $incoming);

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
