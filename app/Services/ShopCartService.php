<?php

namespace App\Services;

use App\Models\Item;

class ShopCartService
{
	/**
	 * Armazena a lista de compra do cliente
	 *
	 * @param string $table
	 * @param string $search
	 * @param string $slug
	 * @param integer $qtdy
	 * @return array
	 */
    public static function store($table, $search, $slug, $qtdy)
    {
		$item = Item::where('slug', $slug)->firstOrFail();

		$data = [
			'item_id'  => $item->id,
			'user_id'  => (int) UserService::getUserIdAuth(),
			'user_ip'  => request()->ip(),
			'quantity' => (int) $qtdy,
		];

		dump($data);
		// recupera o ID do usuario logado ou o cookie existente
		//$data['user_id'] = ;

		// salva o item no BD
		// salva o item em cookies


		return [
			'type'    => $table,
			'current' => $search,
			'item'    => $item,
			'title'   => ['Carrinho'],
			'bread'   => BreadCrumbService::setTitle($table, $search),
		];
	}
}
