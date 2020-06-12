<?php

namespace App\Services;

use App\Models\Stock;
use App\Repositories\StockRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
	 * @param integer $stockId
	 * @param integer $amount
	 * @param string $action
	 * @return integer
	 */
	public static function getNewBalace($stockId, $amount, $action)
	{
		try {
			$stock = (new StockRepository())->findById($stockId);

			if ($action === self::$_actions['INCOMING']) {
				return (int) ($stock->balance + $amount);
			}

			if ($action === self::$_actions['OVERDRAW']) {
				return (int) ($stock->balance - $amount);
			}

		} catch (ModelNotFoundException $exception) {

			return $amount;
		}
	}

	/**
	 * Adiciona quantidade para um item
	 *
	 * @param array $data
	 * @return \App\Models\Stock
	 */
    public static function store($data = [])
    {
		// verifica se esta inserindo um estoque de um NOVO ITEM
		$balance = (int) isset($data['stock_id']) ? self::getNewBalace($data['stock_id'], $data['amount'], $data['action']) : $data['amount'];

		// verifica se a acao e para adicionar ou remover do estoque
		if ($data['action'] === self::$_actions['INCOMING']) {
			$incoming = (int) $data['amount'];
		}
		if ($data['action'] === self::$_actions['OVERDRAW']) {
			$overdraw = (int) $data['amount'];
		}

		$data['user_id']  = UserService::getUserIdAuth();
		$data['incoming'] = $incoming ?? null;
		$data['overdraw'] = $overdraw ?? null;
		$data['balance']  = $balance;

		try {
			// seta como "antigo" (current = 0) o atual registro de estoque deste item
			if (isset($data['stock_id'])) {
				Stock::where('id', $data['stock_id'])->update(['current' => config('constants.STATUS_INACTIVE')]);
			}

			// cria um novo registro de estoque
			return (new StockRepository())->store($data);

		} catch (Exception $exception) {
			return $exception->getMessage();
		}
	}
}
