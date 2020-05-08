<?php

namespace App\Services;

use App\Models\Product;
use App\Services\BaseService;

class ProductService extends BaseService
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
		$query = Product::orderBy('name', 'ASC');

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
		return parent::handleToggleStatus((new Product()), $id);
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Product
	 */
	public static function find($id = null)
	{
		//verifica se foi informado o id
		if (empty($id)) {
			return new Product;
		}

		return Product::find($id)->first();
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return array
	 */
	public static function options()
	{
		$options = Product::orderBy('code', 'ASC')
			->where('status', config('constants.ACTIVE'))
			->pluck('code', 'id');
		// $options = Product::with(['info' => function ($subQuery) {
		// 		$subQuery->orderBy('name', 'ASC');
		// 	}])
		// 	->select([
		// 		'product.id'        => 'id',
		// 		'product_info.name' => 'name'
		// 	])
		// 	->where('status', config('constants.ACTIVE'))
		// 	->pluck('name', 'id');
		// retorna o combobox pronto
		return $options->prepend('Selecione', '');
	}
}
