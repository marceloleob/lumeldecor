<?php

namespace App\Repositories;

use App\Models\ThemeItem;

class ThemeItemRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ThemeItem::class;
}
