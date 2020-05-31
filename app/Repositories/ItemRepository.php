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

	/**
	 * Retorna todos os itens de um tamanho de produto
	 *
	 * @param integer $productSizeId
	 * @return Entity
	 */
	public function findByProductSize($productSizeId)
	{
		$this->data = $this->query()
			->with('productSize')
			->where('product_size_id', $productSizeId)
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

			$collection->name    = $collection->productSize->product->name;
			$collection->size    = $collection->productSize->size;
			$collection->p_price = 'R$' . number_format($collection->p_price, 2, ',', '.');
			$collection->s_price = 'R$' . number_format($collection->s_price, 2, ',', '.');
			// verifica se o tema vai aparecer na home
			if ($collection->launch == config('constants.ACTIVE')) {
				$collection->launch = '<span class="text-focus">Sim</span>';
			} else {
				$collection->launch = '<span class="text-danger">Não</span>';
			}
		});
	}
}
