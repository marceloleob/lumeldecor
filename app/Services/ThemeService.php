<?php

namespace App\Services;

use App\Models\Theme;
use App\Services\BaseService;
use Carbon\Carbon;

class ThemeService extends BaseService
{
    /**
     * Monta a lista com paginacao
     *
     * @param string $search
     * @return array
     */
    public static function list($search = '')
	{
		// retorna a query para a busca do grid
		$query = Theme::orderBy('name', 'ASC');

        // verifica se buscou algum item especifico
        if (!empty($search)) {
            // armazena o valor da busca
            parent::$search = $search;
            // executa a busca
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        // cria uma collection com paginacao para montar o grid
        return parent::handlePagination($query);
	}

	/**
	 * Altera o status do registro
	 *
	 * @param int $id
	 * @return array
	 */
	public static function toggleStatus($id)
	{
		// retorna a entidade criada ou atualizada
		return parent::handleToggleStatus((new Theme()), $id);
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Theme
	 */
	public static function find($id = null)
	{
		//verifica se foi informado o id
		if (empty($id)) {
			return new Theme;
		}

		return Theme::find($id)->first();
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return array
	 */
	public static function options()
	{
		$options = Theme::orderBy('name', 'ASC')
			->where('status', '=', config('constants.ACTIVE'))
			->pluck('name', 'id');
		// retorna o combobox pronto
		return $options->prepend('Selecione', '');
	}

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public static function customCollection()
	{
		// Percorre toda a Collection
		self::$collection->map(function ($array) {
			// monta o periodo
			$today  = Carbon::now();
			$start  = Carbon::createFromDate(null, $array->start_month, $array->start_day);
			$finish  = Carbon::createFromDate(null, $array->finish_month, $array->finish_day);
			$period = $start->format('d/m') . ' até ' . $finish->format('d/m');
			// verifica os temas que ja venceram
			if ($today > $finish) {
				$period = '<span class="text-warning">' . $period . '</span>';
			}
			// verifica os temas que estao ativos hoje
			if ($today < $finish && $today > $start) {
				$period = '<span class="text-primary">' . $period . '</span>';
			}
			$array->period = $period;
		});

		// Executa a customizacao padrao
		parent::customCollection();
	}
}
