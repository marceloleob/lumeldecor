<?php

namespace App\Services;

use App\Models\Supplier;
use App\Services\BaseService;

class SupplierService extends BaseService
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
		$query = Supplier::with(['contacts' => function ($subQuery) use ($search) {
			$subQuery->orderBy('name', 'ASC')->first();
			// verifica se buscou algum item especifico
			if (!empty($search)) {
				// armazena o valor da busca
				parent::$search = $search;
				// executa a busca
				$subQuery->where('name', 'LIKE', '%' . $search . '%');
			}
		}]);

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
		return parent::handleToggleStatus((new Supplier()), $id);
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Supplier
	 */
	public static function find($id = null)
	{
		//verifica se foi informado o id
		if (empty($id)) {
			return new Supplier;
		}

		return Supplier::find($id)->first();
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return array
	 */
	public static function options()
	{
		$options = Supplier::orderBy('company', 'ASC')
			->where('status', '=', config('constants.ACTIVE'))
			->pluck('company', 'id');
		// retorna o combobox pronto
		return $options->prepend('Selecione', '');
	}
}
