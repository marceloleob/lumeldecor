<?php

namespace App\Repositories;

use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Reason::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @return array
	 */
	public function all($search = null, $material = null)
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
	 * Monta as opcoes do select box de reason
	 *
	 * @param string $action
	 * @return array
	 */
	public function options($action)
	{
		// carrega os dados do banco
		return $this->query()
			->orderBy('name')
			->where('id', '<>', 1)
			->where('action', $action)
			->pluck('name', 'id');
	}

	/**
	 * Monta um html para renderizar apos o AJAX do reason
	 *
	 * @param string $action
	 * @return array
	 */
	public function optionsAjax($action)
	{
		// carrega os dados do banco
		$reasons = $this->query()
			->orderBy('name')
			->where('id', '<>', 1)
			->where('action', $action)
			->pluck('name', 'id');

		// construindo as opcoes combobox
		$options = '';
		// percorre os tipos
		foreach ($reasons as $id => $name) {
			// monta o html
			$options .= '<option value="' . $id . '">' . $name . '</option>';
        }
        // retorna o combobox pronto
		return $options;
	}
}
