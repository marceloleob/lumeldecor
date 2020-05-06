<?php

namespace App\Services;

use App\Models\ReceivedEmail;
use App\Services\BaseService;

class ReceivedEmailService extends BaseService
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
		$query = ReceivedEmail::orderBy('name', 'ASC');

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
}