<?php

namespace App\Services;

use App\Repositories\ItemRepository;
use App\Repositories\ShopCartRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class ShopCartService
{
	/**
	 * Recupera as informacoes do carrinho de compra deste usuario para mostrar no MENU
	 *
	 * @return array
	 */
	public static function loadMenu()
	{
		$shopcart = (new ItemRepository)->findByShopCartIp(request()->ip());

		return [
			'count' => $shopcart->count(),
			'items' => $shopcart,
		];
	}

	/**
	 * Recupera as informacoes do carrinho de compra deste usuario para mostrar
	 *
	 * @return array
	 */
	public static function show()
	{
		$items = (new ItemRepository)->findByShopCartIp(request()->ip());

		return [
			'items' => $items,
			'title' => ['Carrinho'],
			'bread' => BreadCrumbService::setTitle(),
		];
	}

	/**
	 * Armazena a lista de compra do cliente
	 *
	 * @param array $params
	 * @return array
	 */
    public static function add($params = [])
    {
		// inicia o acoplamento de uma transacao
		DB::beginTransaction();

		try {

			$item = (new ItemRepository)->findBySlug($params['slug']);

			// instancia o repositorio
			$repository = (new ShopCartRepository);

			$data = [
				'user_ip'     => request()->ip(),
				'item_id'     => $item->id,
				'quantity'    => (int) $params['quantity'],
				'expirate_at' => now()->addDays(30)->toDateTimeString(),
			];

			// verifica se o item ja foi adicionado
			$shopcart = $repository->findByIp($data['user_ip'], $item->id);

			if (empty($shopcart)) {
				// cria um novo
				$repository->store($data);
				// seta a acao
				$action = 'adicionado';

			} else {
				// atualiza
				$repository->update($data);
				// seta a acao
				$action = 'atualizado';
			}

			// efetiva a transacao
			DB::commit();

			return ['success' => $item->product->name . ' ' . $item->productSize->size . ' foi ' . $action . ' no seu carrinho!'];

			return true;

		} catch (Exception $exception) {
			// descarta a transacao
			DB::rollback();

			return false;
		}
	}
}
