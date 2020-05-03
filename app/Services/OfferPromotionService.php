<?php

namespace App\Services;

use App\Models\OfferPromotion;
use App\Services\BaseService;
use Exception;

class OfferPromotionService extends BaseService
{
	/**
	 * Monta a lista com paginacao
	 *
	 * @return array
	 */
	public static function list($request)
	{
		// retorna a query para a busca do grid
		$query = OfferPromotion::orderBy('name', 'ASC');

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
			// executa a acao direto do Model
			$entity = OfferPromotion::toggleStatus($id);

			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'success',
				'message' => 'A promoção ' . $entity->name . ' foi ' . (($entity->status == true) ? 'ativada' : 'desativada!'),
				'current' => $entity->status,
				'error'   => '',
			];
		} catch (Exception $exception) {

			// retorna a entidade criada ou atualizada
			return [
				'type'    => 'error',
				'message' => 'Erro ao ativar/desativar a promoção ' . $id,
				'error'   => $exception,
			];
		}
	}
}
