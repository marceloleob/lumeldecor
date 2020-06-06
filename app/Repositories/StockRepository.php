<?php

namespace App\Repositories;

use App\Models\Stock;
use App\Services\ColorService;
use Illuminate\Database\Eloquent\Collection;

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
		// if (empty($search) && empty($material) && empty($category)) {
		// 	return [];
		// }

		$query = $this->query()
			->orderBy('id', 'DESC')
			->with('item')
			->whereHas(
				'product', function ($subQuery) use ($search, $material, $category)
				{
					// efetua os filtros
					if (!empty($search)) {
						$subQuery->where('name', 'LIKE', '%' . $search . '%');
					}
					if (!empty($material)) {
						$subQuery->where('material_id', $material);
					}
					if (!empty($category)) {
						$subQuery->where('category_id', $category);
					}
				}
			);

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
	 * @return Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection)
		{
			$collection->size         = $collection->item->productSize->size;
			$collection->productName  = $collection->product->name;
			$collection->categoryName = $collection->product->category->name;
			$collection->materialName = $collection->product->material->name;

			// verifica quantas cores tem este item
			$colors = ColorService::format($collection->item->colors);
			$collection->tooltip    = $colors['tooltip'];
			$collection->background = $colors['background'];
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

			$colors = ColorService::format($stock->item->colors);
			$stock->tooltip    = $colors['tooltip'];
			$stock->background = $colors['background'];
		});
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
