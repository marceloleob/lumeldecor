<?php

namespace App\Repositories;

use App\Models\Item;
use App\Services\ItemService;
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
	 * Retorna os dados FORMATADO 'belongsToMany' referente a este modelo
	 *
	 * @param integer $productId
	 * @param integer $productSizeId
	 * @param integer $itemId
	 * @return Entity
	 */
	public function findByIds($productId, $productSizeId, $itemId = null)
	{
		// verifica se esta editando
		if (!empty($itemId)) {
			// recupera o item pelo proprio codigo
			$item = $this->findById($itemId);
		} else {
			// recupera o item pelo produto e tamanho
			$item = $this->findByParentsId($productId, $productSizeId);
		}
		// retorna nulo caso nao tenha encontrado nada
		if (empty($item)) {
			return null;
		}

		$item->product_id = $item->productSize->product->id;
		$item->tones      = $this->convertToArray($item->tones);
		$item->themes     = $this->convertToArray($item->themes);
		$item->profit     = ItemService::profit($item);

		if ($item->pictures->count()) {
			$item->pictureName0 = $item->pictures[0]->name;
			$item->pictureName1 = isset($item->pictures[1]) ? $item->pictures[1]->name : null;
			$item->pictureName2 = isset($item->pictures[2]) ? $item->pictures[2]->name : null;
		}

		return $item;
	}

	/**
	 * Retorna os dados do item ja salvo para preencher o formulario de create
	 *
	 * @param integer $productId
	 * @param integer $productSizeId
	 * @return Entity
	 */
	public function findByParentsId($productId, $productSizeId)
	{
		return $this->query()
			->where('product_id', $productId)
			->where('product_size_id', $productSizeId)
			->first();
	}

	/**
	 * Retorna todos os itens de um tamanho de produto
	 *
	 * @param integer $productSizeId
	 * @return Entity
	 */
	public function findByProductSizeId($productSizeId)
	{
		$this->data = $this->query()
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
			// verifica se o item e lancamento
			if ($collection->launch == config('constants.RULES.LAUNCH.YES')) {
				$collection->launch = '<i class="fas fa-check"></i>';
			} else {
				$collection->launch = '<i class="fas fa-times"></i>';
			}
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

			// recupera as cores do item para mostrar na lista
			$tones = ToneService::format($collection->tones);
			$collection->tooltip    = $tones['tooltip'];
			$collection->background = $tones['background'];
		});
	}
}
