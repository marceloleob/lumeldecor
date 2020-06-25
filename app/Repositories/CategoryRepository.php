<?php

namespace App\Repositories;

use App\Models\Category;
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
	 * @return array
	 */
	public function all($search = null)
	{
		$query = $this->query()->orderBy('name');

		// verifica se buscou algum item especifico
		if (!empty($search)) {
			$query->where('name', 'LIKE', '%' . $search . '%');
		}

        // cria uma collection com paginacao para montar o grid
		$this->pagination($query, $search);
		// formata os registros da collection
		$this->format();

		return [
			'search'   => $search,
			'data'     => $this->data,
			'paginate' => $this->paginate,
		];
	}

	/**
	 * Recupera todos os registros ativos para carregar o menu do Site
	 *
	 * @return Entity
	 */
	public function loadMenu()
	{
		$categories = $this->query()
			->where('status', config('constants.STATUS.ACTIVE'))
			->orderBy('name')
			->get();
		// divide o resultado da busca em 3 blocos
		return $categories->split(3);
	}

	/**
	 * Monta as opcoes do select box de category
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return string
	 */
	public function options()
	{
		return $this->query()
			->orderBy('name')
			->where('status', config('constants.STATUS.ACTIVE'))
			->pluck('name', 'id');
	}
}
