<?php

namespace App\Repositories;

use App\Models\ItemColor;

class ItemColorRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ItemColor::class;

	/**
	 * Retorna todos as cores de um determinado item
	 *
	 * @param integer $itemId
	 * @return Entity
	 */
	public function findByItem($itemId)
	{
		return $this->query()->where('item_id', $itemId)->get();
	}
}
