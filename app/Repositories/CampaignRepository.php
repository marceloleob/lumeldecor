<?php

namespace App\Repositories;

use App\Models\Campaign;
use Carbon\Carbon;

class CampaignRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Campaign::class;

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
			// monta o periodo
			$today  = Carbon::now();
			$start  = Carbon::createFromDate(null, $collection->start_month, $collection->start_day);
			$finish = Carbon::createFromDate(null, $collection->finish_month, $collection->finish_day);
			$period = $start->format('d/m') . ' até ' . $finish->format('d/m');
			// verifica os temas que ja venceram
			if ($today > $finish) {
				$period = '<span class="text-warning">' . $period . '</span>';
			}
			// verifica os temas que estao ativos hoje
			if ($today < $finish && $today > $start) {
				$period = '<span class="text-primary">' . $period . '</span>';
			}
			$collection->period = $period;
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
}
