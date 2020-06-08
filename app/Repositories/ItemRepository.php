<?php

namespace App\Repositories;

use App\Models\Item;
use App\Services\ToneService;

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
	public function findByProductSizeId($productSizeId)
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

			$collection->product_id  = $collection->productSize->product->id;
			$collection->productName = $collection->productSize->product->name;
			$collection->size        = $collection->productSize->size;
			// verifica se o tema vai aparecer na home
			if ($collection->launch == config('constants.ACTIVE')) {
				$collection->launch = '<span class="text-focus">Sim</span>';
			} else {
				$collection->launch = '<span class="text-danger">Não</span>';
			}
			// verifica se e inativo
			if ($collection->status == config('constants.ACTIVE')) {
				// seta ativo como default
				$collection->status = ['class' => 'success', 'label' => 'Ativo'];
				$collection->styles = ['class' => 'btn-outline-danger', 'label' => 'fas fa-ban'];
			} else {
				// seta inativo como default
				$collection->status = ['class' => 'danger', 'label' => 'Inativo'];
				$collection->styles = ['class' => 'btn-outline-success', 'label' => 'far fa-check-circle'];
			}

			// verifica quantas cores tem este item
			$tones = ToneService::format($collection->tones);
			$collection->tooltip    = $tones['tooltip'];
			$collection->background = $tones['background'];
		});
	}
}
