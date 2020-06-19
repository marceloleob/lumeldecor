<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Category::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @param  string $material
	 * @return array
	 */
	public function all($search = null, $material = null)
	{
		$query = $this->query()->orderBy('name');
		$query = $this->query()
			->select(
				'categories.id',
				'categories.name AS category',
				'categories.status',
				'materials.name AS material'
			)
			->join('materials', 'categories.material_id', '=', 'materials.id')
			->orderBy('materials.name')
			->orderBy('categories.name');

		// verifica se buscou algum item especifico
		if (!empty($search)) {
			$query->where('categories.name', 'LIKE', '%' . $search . '%');
		}
		if (!empty($material)) {
			$query->where('categories.material_id', $material);
		}

        // cria uma collection com paginacao para montar o grid
		$this->pagination($query, $search);
		// formata os registros da collection
		$this->format();

		return [
			'search'   => $search,
			'material' => $material,
			'data'     => $this->data,
			'paginate' => $this->paginate,
		];
	}

	/**
	 * Recupera todos os registros ativos
	 *
	 * @return Entity
	 */
	public function allActive()
	{
		$categories = $this->query()
			->select('name')
			->distinct()
			->where('status', config('constants.STATUS_ACTIVE'))
			->orderBy('name')
			// ->limit(13)
			->get()
			->map(function ($category)
			{
				return [
					'name' => $category->name,
					'slug' => $category->slug = Str::slug($category->name)
				];
			});
		// divide o resultado da busca em 3 blocos
		return $categories->split(3);
	}

	/**
	 * Monta as opcoes do select box de category
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return string
	 */
	public function options(Request $request = null)
	{
		$materialId = $request->material ?? null;
		$categoryId = $request->category ?? null;
		// verifica se nao foi informado o material
		if (empty($materialId)) {
			return [];
		}
		// carrega os dados do banco
		$categories = $this->query()
			->with(['material' => function ($subQuery)
			{
				$subQuery->orderBy('name');
			}])
			->orderBy('name')
			->where('status', config('constants.STATUS_ACTIVE'))
			->where('material_id', $materialId)
			->pluck('name', 'id');

		// construindo as opcoes combobox
		$options = '';
		// percorre os tipos
		foreach ($categories as $id => $name) {
			// verifica se existe categoria
			if ($categoryId == $id) {
				// monta o html
				$options .= '<option value="' . $id . '" selected>' . $name . '</option>';
			} else {
				// monta o html
				$options .= '<option value="' . $id . '">' . $name . '</option>';
			}
        }
        // retorna o combobox pronto
		return $options;
	}
}
