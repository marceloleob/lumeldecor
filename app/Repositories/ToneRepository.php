<?php

namespace App\Repositories;

use App\Models\Tone;

class ToneRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Tone::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @param  string $color
	 * @return array
	 */
	public function all($search = null, $color = null)
	{
		$query = $this->query()->orderBy('hexa');

		// verifica se buscou algum item especifico
		if (!empty($search)) {
			$query->where('name', 'LIKE', '%' . $search . '%');
		}
		if (!empty($color)) {
			$query->where('color_id', $color);
		}

		// seta o total da pagina
		$this->total = 200;
        // cria uma collection com paginacao para montar o grid
		$this->pagination($query, $search);
		// formata os registros da collection
		$this->format();

		return [
			'search'   => $search,
			'color'    => $color,
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
			->where('status', config('constants.ACTIVE'))
			->get();
	}
}
