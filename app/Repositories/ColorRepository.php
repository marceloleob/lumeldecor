<?php

namespace App\Repositories;

use App\Models\Color;

class ColorRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Color::class;

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
		return $this->query()
			->where('status', config('constants.RULES.STATUS.ACTIVE'))
			->orderBy('name')
			->get();
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
			->where('status', config('constants.RULES.STATUS.ACTIVE'))
			->pluck('name', 'id');
	}
}
