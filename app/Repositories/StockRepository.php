<?php

namespace App\Repositories;

use App\Models\Stock;
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
		if (empty($search) && empty($material) && empty($category)) {
			return [];
		}

		$query = $this->query()->orderBy('name');

		// verifica se buscou algum item especifico
		if (!empty($search)) {
			$query->where('name', 'LIKE', '%' . $search . '%');
		}
		if (!empty($material)) {
			$query->where('material_id', $material);
		}
		if (!empty($category)) {
			$query->where('category_id', $category);
		}

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
