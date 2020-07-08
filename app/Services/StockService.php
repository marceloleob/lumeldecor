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
	 * Adiciona quantidade para um item novo
	 *
	 * @param integer $itemId
	 * @param integer $productId
	 * @param integer $amount
	 * @return \App\Models\Stock
	 */
	public static function new($itemId, $productId, $amount)
	{
		// seta os dados relevantes para o estoque
		$data = [
			'product_id' => $productId,
			'item_id'    => $itemId,
			'reason_id'  => StockService::$_reason['NEW_ITEM'],
			'amount'     => $amount,
			'action'     => StockService::$_actions['INCOMING'],
			'balance'    => $amount,
		];

		self::store($data);
	}

	/**
	 * Adiciona ou Atualiza quantidade para um item
	 *
	 * @param array  $data
	 * @param integer $data
	 * @return \App\Models\Stock
	 */
	public static function store($data = [], $id = null)
	{
		// verifica se esta atualizando
		if (!empty($id)) {
			$data['balance'] = self::getNewBalace($data['stock_id'], $data['amount'], $data['action']);
		}

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

		try {
			// seta como "antigo" (current = 0) o registro atual para o "novo" entrar como (current = 1)
			if (!empty($id)) {
				Stock::where('id', $data['id'])->update(['current' => config('constants.RULES.STATUS.INACTIVE')]);
			}

			// cria um novo registro de estoque
			return (new StockRepository())->store($data);

		} catch (Exception $exception) {
			return $exception->getMessage();
		}
	}
}
