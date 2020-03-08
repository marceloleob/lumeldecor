<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use Exception;

class UserService extends BaseService
{
	/**
	 * Monta a lista com paginacao
	 *
	 * @return array
	 */
	public static function list($request)
	{
		// retorna a query para a busca do grid
		$query = User::with(['rules' => function ($subQuery) {
			$subQuery->orderBy('name', 'ASC');
		}]);

		// verifica se buscou algum item especifico
		if (!empty($request['search'])) {
			$query->where('name', 'LIKE', '%' . $request['search'] . '%');
		}

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
			// busca o usuario
			$user = User::where('id', $id)->first();
			// verifica se ele e um administrador
			if ($user->user_rule_id == 1) {
				throw new Exception('Este usuário não pode ser desativado!');
			}

			// executa a acao direto do Model
			$entity = User::toggleStatus($id);

			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'success',
				'message' => 'O usuário ' . $entity->name . ' foi ' . (($entity->status == true) ? 'ativado' : 'desativado!'),
				'current' => $entity->status,
				'error'   => '',
			];
		} catch (Exception $exception) {

			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'error',
				'message' => 'Erro ao ativar/desativar o usuário ' . $id,
				'error'   => $exception->getMessage(),
			];
		}
	}
}
