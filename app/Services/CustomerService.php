<?php

namespace App\Services;

use App\Models\Customer;
use App\Services\BaseService;
use Exception;

class CustomerService extends BaseService
{
	/**
	 * Monta a lista com paginacao
	 *
	 * @return array
	 */
	public static function list($request)
	{
		// retorna a query para a busca do grid
		$query = Customer::with(['user' => function ($subQuery) use ($request) {
			$subQuery->orderBy('name', 'ASC');
			// verifica se buscou algum item especifico
			if (!empty($request['search'])) {
				$subQuery->where('name', 'LIKE', '%' . $request['search'] . '%');
			}
		}]);

		// cria uma collection com pagination para montar o grid
		parent::handlePagination($query);
		// efetua o tratamento no collection
		static::customCollection();

		return [
			'data'     => parent::$collection,
			'paginate' => parent::$paginate,
		];
	}

	/**
	 * Altera o status do registro
	 *
	 * @param int $id
	 * @return array
	 */
	public static function toggleStatus($id)
	{
		try {
			// executa a acao direto do Model
			$entity = Customer::toggleStatus($id);

			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'success',
				'message' => 'O cliente ' . $entity->name . ' foi ' . (($entity->status == true) ? 'ativado' : 'desativado!'),
				'current' => $entity->status,
				'error'   => '',
			];
		} catch (Exception $exception) {

			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'error',
				'message' => 'Erro ao ativar/desativar o cliente ' . $id,
				'error'   => $exception,
			];
		}
	}
}
