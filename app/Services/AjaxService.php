<?php

namespace App\Services;

use App\Services\BaseService;

class AjaxService extends BaseService
{
	/**
	 * Encontrar o servico responsavel pelo registro que sera alterado
	 *
	 * @param int $code
	 * @param string $model
	 * @return array
	 */
	public static function status($code, $model)
	{
		// recupera o nome do servico
		$service = parent::getService($model);
		// altera o status do registro
		return $service::toggleStatus($code);
	}

}
