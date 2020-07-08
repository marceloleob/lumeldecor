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
	 * Retorna todos os sizes de um produto pelo codigo do produto
	 *
	 * @param integer $productId
	 * @return Entity
	 */
	public function findByProductId($productId)
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
		$this->data->map(function ($collection)
		{
			$collection->productId   = $collection->product->id;
			$collection->productName = $collection->product->name;
			$collection->shape       = ($collection->shape === 'R') ? 'Redondo' : 'Quadrado';
			// verifica se e inativo
			if ($collection->status == config('constants.RULES.STATUS.ACTIVE')) {
				// seta ativo como default
				$collection->status = ['class' => 'success', 'label' => 'Ativo'];
				$collection->styles = ['class' => 'btn-outline-danger', 'label' => 'fas fa-ban'];
			} else {
				// seta inativo como default
				$collection->status = ['class' => 'danger', 'label' => 'Inativo'];
				$collection->styles = ['class' => 'btn-outline-success', 'label' => 'far fa-check-circle'];
			}
		});
	}

	/**
	 * Verifica se o novo tamanho pode ser adicionado
	 *
	 * @param integer $productId
	 * @param string  $size
	 * @return boolean
	 */
	public function validateNewSize($productId, $size)
	{
		// recupera todos os tamanhos do produto
		$sizes = $this->query()
			->where('product_id', $productId)
			->get();
		// caso nao encontre nada no banco, retorna OK
		if ($sizes->count() === 0) {
			return true;
		}
		// verifica se o novo tamanho e um tamanho "Unico"
		if ('U' === $size) {
			return false;
		}
		// veririca se o novo tamanho ja existe
		foreach ($sizes as $value) {
			if ($value->size === $size) {
				return false;
			}
		}
		// retorna OK
		return true;
	}
}
