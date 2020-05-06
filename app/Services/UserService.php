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
     * @param string $search
     * @return array
     */
    public static function list($search = '')
	{
		// retorna a query para a busca do grid
		$query = User::with(['rules' => function ($subQuery) {
			$subQuery->orderBy('name', 'ASC');
		}]);

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
		// busca o usuario
		$user = User::where('id', $id)->first();
		// verifica se ele e um administrador
		if ($user->user_rule_id == 1) {
			return ['danger' => 'Este usuário não pode ser desativado!'];
		}

		// retorna a entidade criada ou atualizada
		return parent::handleToggleStatus((new User()), $id);
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Category
	 */
	public static function find($id = null)
	{
		//verifica se foi informado o id
		if (empty($id)) {
			return new User;
		}

		return User::find($id)->first();
	}
}
