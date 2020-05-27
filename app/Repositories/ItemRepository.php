<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Item::class;
}
