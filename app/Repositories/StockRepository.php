<?php

namespace App\Repositories;

use App\Models\Stock;
use App\Services\ToneService;

class StockRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Stock::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @param  string $material
	 * @param  string $category
	 * @return array
	 */
	public function all($search = null, $material = null, $category = null)
	{
		$query = $this->query()
			->with('item')
			->whereHas(
				'product', function ($whereHas) use ($search, $material, $category)
				{
					// efetua os filtros
					if (!empty($search)) {
						$whereHas->where('name', 'LIKE', '%' . $search . '%');
					}
					if (!empty($material)) {
						$whereHas->where('material_id', $material);
					}
					if (!empty($category)) {
						$whereHas->where('category_id', $category);
					}
				}
			)
			->where('current', config('constants.STATUS_ACTIVE'))
			->orderByDesc('created_at');

        // cria uma collection com paginacao para montar o grid
		$this->pagination($query, $search, $material, $category);
		// formata os registros da collection
		$this->format();

		return [
			'search'   => $search,
			'material' => $material,
			'category' => $category,
			'data'     => $this->data,
			'paginate' => $this->paginate,
		];
	}

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection)
		{
			$collection->size         = $collection->item->productSize->size;
			$collection->itemId       = $collection->item->id;
			$collection->productId    = $collection->product->id;
			$collection->productName  = $collection->product->name;
			$collection->categoryName = $collection->product->category->name;
			$collection->materialName = $collection->product->material->name;

			// verifica quantas cores tem este item
			$tones = ToneService::format($collection->item->tones);
			$collection->tooltip    = $tones['tooltip'];
			$collection->background = $tones['background'];
		});
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Entity
	 */
	public function findById($id)
	{
		return tap($this->query()->with('item', 'product')->where('id', $id)->firstOrFail(), function ($stock)
		{
			$tones = ToneService::format($stock->item->tones);
			$stock->tooltip    = $tones['tooltip'];
			$stock->background = $tones['background'];
		});
	}

	/**
	 * Retorna o historico de estoques deste item
	 *
	 * @param integer $itemId
	 * @return Entity
	 */
	public function findByItemId($itemId)
	{
		return $this->query()->with('item', 'product')->where('item_id', $itemId)->get();
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $productId
	 * @param integer $itemId
	 * @return Entity
	 */
	public function getBalance($productId, $itemId)
	{
		return $this->query()
			->where('product_id', $productId)
			->where('item_id', $itemId)
			->firstOrFail();
	}
}
