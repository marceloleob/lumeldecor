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
}
