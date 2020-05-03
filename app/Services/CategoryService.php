<?php

namespace App\Services;

use App\Models\Category;
use App\Services\BaseService;
use Exception;

class CategoryService extends BaseService
{
	/**
	 * Monta as opcoes do select box
	 *
	 * @return array
	 */
	public static function options()
	{
		return Category::orderBy('name', 'ASC')
			->where('status', '=', config('constants.ACTIVE'))
			->get();
	}

    /**
     * Monta a lista com paginacao
     *
     * @return array
     */
    public static function list($search = '')
    {
		// retorna a query para a busca do grid
		$query = Category::with(['material' => function ($subQuery) {
			$subQuery->orderBy('name', 'ASC');
		}]);

        // verifica se buscou algum item especifico
        if (!empty($search)) {
            // armazena o valor da busca
            parent::$search = $search;
            // executa a busca
            $query->where('name', 'LIKE', '%' . $search . '%');
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
			$entity = Category::toggleStatus($id);

			// retorna a entidade criada ou atualizada
			return [
				'success'   => 'A categoria "<strong>' . $entity->name . '</strong>" foi ' . (($entity->status == true) ? 'ativada' : 'desativada!'),
				'exception' => '',
			];
		} catch (Exception $exception) {

			// retorna a entidade criada ou atualizada
			return [
				'danger'    => 'Erro ao ativar/desativar a categoria ' . $id,
				'exception' => $exception,
			];
		}
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
			return new Category;
		}

		return Category::with('material')->find($id)->first();
	}
}
