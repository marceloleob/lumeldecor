<?php

namespace App\Services;

use App\Models\Customer;
use App\Services\BaseService;

class CustomerService extends BaseService
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
		$query = Customer::with(['user' => function ($subQuery) use ($search) {
			$subQuery->orderBy('name');
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
		return parent::handleToggleStatus((new Customer()), $id);
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Customer
	 */
	public static function find($id = null)
	{
		//verifica se foi informado o id
		if (empty($id)) {
			return new Customer;
		}

		return Customer::find($id)->first();
	}
}
