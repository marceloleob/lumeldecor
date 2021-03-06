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
	 * @param  string $scope
	 * @param  string $search
	 * @return array
	 */
	public function all($scope, $search = null)
	{
		$query = $this->query()
			->orderBy('name')
			->$scope();

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
