<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = User::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @return array
	 */
	public function all($search = null)
	{
		$query = $this->query()->with(['rules' => function ($subQuery) use ($search)
		{
			$subQuery->orderBy('name');
			// verifica se buscou algum item especifico
			if (!empty($search)) {
				// executa a busca
				$subQuery->where('name', 'LIKE', '%' . $search . '%');
			}
		}])
		->where('id', '<>', config('constants.DEVELOPER_ID'));

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
	 * Monta as opcoes do select box
	 *
	 * @return Collection
	 */
	public function options()
	{
		return $this->query()
			->orderBy('name')
			->where('status', config('constants.STATUS.ACTIVE'))
			->pluck('name', 'id');
	}
}
