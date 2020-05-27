<?php

namespace App\Repositories;

use App\Models\ProductInfo;

class ProductInfoRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ProductInfo::class;
}
