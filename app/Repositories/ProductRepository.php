<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Product::class;

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
		$query = $this->query()->orderBy('done')->orderBy('name');

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
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection)
		{
			$collection->productName  = $collection->name;
			$collection->categoryName = $collection->category->name;
			$collection->materialName = $collection->material->name;
			// verifica se o producto e um destaque
			if ($collection->featured == config('constants.STATUS_ACTIVE')) {
				$collection->featured = '<i class="fas fa-check"></i>';
			} else {
				$collection->featured = '<i class="fas fa-times"></i>';
			}
			// verifica se o producto e um lancamento
			if ($collection->launch == config('constants.STATUS_ACTIVE')) {
				$collection->launch = '<i class="fas fa-check"></i>';
			} else {
				$collection->launch = '<i class="fas fa-times"></i>';
			}
			// verifica se o cadastro do produto esta completo
			if ($collection->done == config('constants.STATUS_ACTIVE')) {
				// verifica se e inativo
				if ($collection->status == config('constants.STATUS_ACTIVE')) {
					// seta ativo como default
					$collection->status = ['class' => 'success', 'label' => 'Ativo'];
					$collection->styles = ['class' => 'btn-outline-danger', 'label' => 'fas fa-ban'];
				} else {
					// seta inativo como default
					$collection->status = ['class' => 'danger', 'label' => 'Inativo'];
					$collection->styles = ['class' => 'btn-outline-success', 'label' => 'far fa-check-circle'];
				}
			} else {
				// seta cadastro incompleto
				$collection->status = ['class' => 'warning', 'label' => 'Incompleto'];
				$collection->styles = ['class' => 'btn-outline-ligth', 'label' => 'fas fa-ban'];
			}
		});
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return Collection
	 */
	public function options()
	{
		return $this->query()
			->orderBy('name')
			->where('status', config('constants.STATUS_ACTIVE'))
			->get()
			->pluck('name', 'id');
	}
}
