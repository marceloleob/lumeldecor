<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

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
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function options(Request $request = null)
	{
		$materialId = $request->material ?? null;
		$categoryId = $request->category ?? null;
		// verifica se nao foi informado o material
		if (empty($materialId)) {
			return ['' => 'Selecione um material'];
		}
		// carrega os dados do banco
		$categories = $this->query()
			->with(['material' => function ($subQuery)
			{
				$subQuery->orderBy('name');
			}])
			->orderBy('name')
			->where('status', config('constants.ACTIVE'))
			->where('material_id', $materialId)
			->pluck('name', 'id');

		// construindo as opcoes combobox
		$options = '<option value="">Selecione</option>';
		// percorre os tipos de imovel
		foreach ($categories as $id => $name) {
			// verifica se existe categoria
			if ($categoryId == $id) {
				// monta o html
				$options .= '<option value="' . $id . '" selected>' . $name . '</option>';
			} else {
				// monta o html
				$options .= '<option value="' . $id . '">' . $name . '</option>';
			}
        }
        // retorna o combobox pronto
		return $options;
	}
}
