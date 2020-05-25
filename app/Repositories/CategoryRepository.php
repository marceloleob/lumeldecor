<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Category::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @return array
	 */
	public function all($search = null)
	{
		$query = $this->query()->orderBy('name');

        if (!empty($search)) {
            // procura o termo
            $query->where('name', 'LIKE', '%' . $search . '%');
        }
        // cria uma collection com paginacao para montar o grid
		$this->pagination($query, $search);
		// formata os registros da collection
		$this->format();

		return [
			'search'   => $search,
			'data'     => $this->data,
			'paginate' => $this->paginate,
		];
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return array
	 */
	public function options($material = null)
	{
		// verifica se nao foi informado o material
		if (empty($material)) {
			return ['' => 'Selecione'];
		}
		// carrega os dados do banco
		$categories = $this->query()
			->with(['material' => function ($subQuery)
			{
				$subQuery->orderBy('name');
			}])
			->orderBy('name')
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

	// /**
	//  * Customiza o formato enviado para a view
	//  *
	//  * @return array
	//  */
	// public function format()
	// {
	// 	return [
	// 		'id'       => $this->id,
	// 		'name'     => $this->name,
	// 		'status'   => $this->status,
	// 		'material' => $this->material->name,
	// 	];
	// }
}
