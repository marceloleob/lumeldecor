<?php

namespace App\Services;

use Exception;

class BaseService
{
    /**
     * Armazena uma colecao do banco
     *
     * @var Collection
     */
    public static $collection;

    /**
     * Armazena os dados da paginacao
     *
     * @var Paginator
     */
    public static $paginate;

    /**
     * Armazena o valor da busca
     *
     * @var string $search
     */
    public static $search = null;

    /**
     * Handler paginator
     *
     * @param Builder $query
     * @return void
     */
	public static function handlePagination($query)
	{
		// efetiva a busca no BD obedecendo as regras da paginacao
        self::$collection = $data = $query->paginate(config('constants.TOTAL_PAGE'));
        // constroi os links da paginacao
		self::$paginate = $data->links();
        // verifica se foi feito uma busca
        if (!empty(self::$search)) {
            // constroi os links da paginacao
            self::$paginate = $data->appends(['search' => self::$search])->links();
		}

        // efetua o tratamento no collection
        static::customCollection();

		// retorna a entidade com paginacao e busca (se existir)
		return [
            'data'     => self::$collection,
            'search'   => self::$search,
			'paginate' => self::$paginate,
		];
    }

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public static function customCollection()
	{
		// Percorre toda a Collection
		self::$collection->map(function ($array) {
			// verifica se e inativo
			if ($array->status == config('constants.ACTIVE')) {
                // seta ativo como default
                $array->status = ['class' => 'success', 'label' => 'Ativo'];
                $array->trash  = ['class' => 'btn-outline-danger', 'label' => 'fa-recycle'];
			} else {
                // seta inativo como default
				$array->status = ['class' => 'danger', 'label' => 'Inativo'];
				$array->trash  = ['class' => 'btn-outline-success', 'label' => 'fa-recycle'];
            }
		});
	}

	/**
	 * Altera o status do registro (ativo ou inativo)
	 *
	 * @param Illuminate\Database\Eloquent\Model $model
	 * @param int $id
	 * @return array
	 */
	public static function handleToggleStatus($model, $id)
	{
		try {
			// executa a acao direto do Model
			$entity = $model::toggleStatus($id);

			// retorna a entidade criada ou atualizada
			return [
				'success'   => 'O registro "<strong>' . $entity->name . '</strong>" foi ' . (($entity->status == true) ? 'ativado' : 'desativado!'),
				'exception' => '',
			];
		} catch (Exception $exception) {

			// retorna a entidade criada ou atualizada
			return [
				'danger'    => 'Erro ao ativar/desativar o registro de código ' . $id,
				'exception' => $exception,
			];
		}
	}
}
