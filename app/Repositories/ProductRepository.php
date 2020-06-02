<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
	/**
	 * Armazena a entidade
	 *
	 * @var Entity
	 */
	protected $model = Product::class;

	/**
	 * Executa a busca para a listagem com paginacao e filtro
	 *
	 * @param  string $search
	 * @return array
	 */
	public function all($search = null)
	{
		$query = $this->query()->orderBy('name');
			// verifica se buscou algum item especifico
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
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection)
		{
			$collection->productName  = $collection->name;
			$collection->categoryName = $collection->category->name;
			$collection->materialName = $collection->category->material->name;
			// verifica se o producto e um Lancamento
			if ($collection->featured == config('constants.ACTIVE')) {
				$collection->featured = '<span class="text-focus">Sim</span>';
			} else {
				$collection->featured = '<span class="text-danger">Não</span>';
			}
			// verifica se e inativo
			if ($collection->status == config('constants.ACTIVE')) {
                // seta ativo como default
                $collection->status = ['class' => 'success', 'label' => 'Ativo'];
                $collection->styles = ['class' => 'btn-outline-danger', 'label' => 'fas fa-ban'];
			} else {
                // seta inativo como default
				$collection->status = ['class' => 'danger', 'label' => 'Inativo'];
				$collection->styles = ['class' => 'btn-outline-success', 'label' => 'far fa-check-circle'];
			}
		});
	}

	/**
	 * Monta as opcoes do select box
	 *
	 * @return Collection
	 */
	public function options()
	{
		$options = $this->query()
			->orderBy('name')
			->where('status', config('constants.ACTIVE'))
			->get()
			->pluck('name', 'id');
		// retorna o combobox pronto
		return $options->prepend('Selecione', '');
	}
}
