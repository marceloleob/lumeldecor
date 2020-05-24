<?php

namespace App\Services;

use App\Models\Item;
use App\Services\BaseService;
use Exception;

class ItemService extends BaseService
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


        // $entity = Item::orderBy('name')
        //     ->where('status', config('constants.ACTIVE'))
        //     ->where('id', $id)
        //     ->with('category')
        //     ->firstOrFail()
        //     ->map(function ($item) {
        //         return $this->format($item);
        //     });



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
		return parent::handleToggleStatus((new Item()), $id);
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Item
	 */
	public static function find($id = null)
	{
		// verifica se foi informado o id
		if (empty($id)) {
			return new Item;
		}

        $entity = Item::orderBy('name')
            ->where('status', config('constants.ACTIVE'))
            ->where('id', $id)
            ->with('category')
            ->firstOrFail();

        return self::format($entity);
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
            $entity = Item::store($request->all());
            // retorna a entidade criada ou atualizada
            return [
                'success' => 'Informações Básicas do produto foram ' . ((isset($request->id)) ? 'atualizadas' : 'cadastradas') . ' com sucesso!',
                'id'      => $entity->id,
            ];
        } catch (Exception $exception) {
            // retorna a entidade criada ou atualizada
            return [
                'danger' => 'Erro ao ' . (isset($request->id) ? 'atualizar' : 'cadastrar') . ', tente novamente!',
                'error'  => $exception,
            ];
        }
    }

    protected static function format($item)
    {
        return [
            'id'          => $item->id,
            'name'        => $item->name,
            'hashtag'     => $item->hashtag,
            'description' => $item->description,
            'featured'    => $item->featured,
            'status'      => $item->status,
            'category'    => $item->category->name,
            'material'    => $item->category->material->name,
        ];
    }
}
