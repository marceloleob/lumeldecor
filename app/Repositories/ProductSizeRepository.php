<?php

namespace App\Repositories;

use App\Models\ProductSize;

class ProductSizeRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = ProductSize::class;

	/**
	 * Retorna todos os sizes de um produto
	 *
	 * @param integer $productId
	 * @return Entity
	 */
	public function findByProduct($productId)
	{
		$this->data = $this->query()
			->with('product')
			->where('product_id', $productId)
			->get();
		// formata os registros da collection
		$this->format();

		return $this->data;
	}

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection) {

			$collection->name      = $collection->product->name;
			$collection->length    = number_format($collection->pro_length, 2, ',', '.');
			$collection->width     = number_format($collection->pro_width, 2, ',', '.');
			$collection->height    = number_format($collection->pro_height, 2, ',', '.');
		});
	}
}
