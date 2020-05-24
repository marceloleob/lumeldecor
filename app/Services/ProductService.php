<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Product;
use App\Services\BaseService;
use Exception;

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
		$query = Item::with(['product' => function($subQuery) {
			$subQuery->select('code');
		}])->orderBy('name');

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
     * Save or Update the entity
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public static function store($request = [])
    {
        try {
            // save or update
            $entity = Product::store($request->all());
            // retorna a entidade criada ou atualizada
            return [
                'success' => 'Produto ' . ((isset($request->id)) ? 'atualizado' : 'cadastrado') . ' com sucesso!',
                'entity'  => $entity,
            ];
        } catch (Exception $exception) {
            // retorna a entidade criada ou atualizada
            return [
                'danger' => 'Erro ao ' . (isset($request->id) ? 'atualizar' : 'cadastrar') . ', tente novamente!',
                'error'  => $exception,
            ];
        }
    }
}
