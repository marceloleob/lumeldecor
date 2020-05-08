<?php

namespace App\Services;

use App\Models\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
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
		return parent::handleToggleStatus((new Category()), $id);
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

	/**
	 * Monta as opcoes do select box
	 *
	 * @return array
	 */
	public static function options($material = null)
	{
		// verifica se nao foi informado o material
		if (empty($material)) {
			return ['' => 'Selecione'];
		}
		// carrega os dados do banco
		$categories = Category::with(['material' => function ($subQuery) {
				$subQuery->orderBy('name', 'ASC');
			}])
			->orderBy('name', 'ASC')
			->where('status', config('constants.ACTIVE'))
			->where('material_id', $material)
			->pluck('name', 'id');

		// construindo as opcoes combobox
		$options = '<option value="">Selecione</option>';
		// percorre os tipos de imovel
		foreach ($categories as $id => $name) {
			// verifica se existe categoria
			// if ($propertyTypeId == $id) {
			// 	// monta o html
			// 	$options .= '<option value="' . $id . '" selected>' . $name . '</option>';
			// } else {
				// monta o html
				$options .= '<option value="' . $id . '">' . $name . '</option>';
			// }
        }
        // retorna o combobox pronto
		return $options;
	}
}
