<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Customer::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @return array
	 */
	public function all($search = null)
	{
		$query = $this->query()->with(['user' => function ($subQuery) use ($search) {
			$subQuery->orderBy('name');
			// verifica se buscou algum item especifico
			if (!empty($search)) {
				// procura o termo
				$subQuery->where('name', 'LIKE', '%' . $search . '%');
			}
		}]);

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
		$options = $this->query()
			->orderBy('name')
			->where('status', config('constants.ACTIVE'))
			->pluck('name', 'id');
		// retorna o combobox pronto
		return $options->prepend('Selecione', '');
	}
}