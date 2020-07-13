<?php

namespace App\Repositories;

use App\Models\ShopCart;

class ShopCartRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ShopCart::class;

	/**
	 * Update model without id attribute
	 *
	 * @param array $data
	 * @return Entity
	 */
	public function update($data = [])
	{
		return $this->query()
			->where('user_ip', $data['user_ip'])
			->where('item_id', $data['item_id'])
			->update($data);
	}

	/**
	 * Recupera o carrinho de compra do usuario
	 *
	 * @param  string $ip
	 * @return Entity
	 */
	public function all($ip)
	{
		return $this->query()->where('user_ip', $ip)->get();
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param string  $ip
	 * @param integer $item
	 * @return Entity
	 */
	public function findByIp($ip, $item)
	{
		return $this->query()
			->where('user_ip', $ip)
			->where('item_id', $item)
			->first();
	}
}
