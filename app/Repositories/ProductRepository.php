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
		// $query = DB::table('products')
		// 	->join('categories', 'categories.id', '=', 'products.category_id')
		// 	->join('materials', 'materials.id', '=', 'categories.material_id')
		// 	->select(
		// 		'products.*',
		// 		'categories.id AS category_id',
		// 		'categories.name AS category',
		// 		'materials.id AS material_id',
		// 		'materials.name AS material'
		// 	);

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
			if ($collection->featured == config('constants.ACTIVE')) {
				$collection->featured = '<span class="text-focus">Sim</span>';
			} else {
				$collection->featured = '<span class="text-danger">Não</span>';
			}
			// verifica se o producto e um lancamento
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
		});
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return Collection
	 */
	public function options()
	{
		$options = $this->query()
			->orderBy('name')
			->where('status', config('constants.ACTIVE'))
			->get()
			->pluck('name', 'id');
		// retorna o combobox pronto
		return $options->prepend('Selecione', '');
	}
}
