<?php

namespace App\Repositories;

use App\Models\Theme;

class ThemeRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Theme::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @return array
	 */
	public function all($search = null)
	{
		$query = $this->query()->orderBy('name');

        if (!empty($search)) {
            // procura o termo
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
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection)
		{
			// verifica se o tema vai aparecer na home
			if ($collection->show == config('constants.RULES.SHOW.YES')) {
				$collection->show = '<i class="fas fa-check"></i>';
			} else {
				$collection->show = '<i class="fas fa-times"></i>';
			}
			// verifica se e inativo
			if ($collection->status == config('constants.RULES.STATUS.ACTIVE')) {
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
		return $this->query()
			->orderBy('name')
			->where('status', config('constants.RULES.STATUS.ACTIVE'))
			->pluck('name', 'id');
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
			->where('show', config('constants.RULES.SHOW.YES'))
			->orderBy('name')
			->get();
	}
}
