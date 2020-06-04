<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Exception;

class BaseRepository
{
	/**
	 * Armazena o nome do Model
	 *
	 * @var string
	 */
	protected $model;

	/**
     * Armazena uma colecao do banco
     *
     */
    public $data;

    /**
     * Armazena os dados da paginacao
     *
     * @var Paginator
     */
	public $paginate;

    /**
	 * Cria uma nova instancia
	 *
     * @return Model
     */
    public function make()
    {
        return new $this->model;
	}

    /**
	 * Cria uma nova query buider
	 *
     * @return Builder
     */
    public function query()
    {
        return $this->make()->newQuery();
	}

	/**
	 * Retorna os dados referente a este modelo
	 *
	 * @param integer $id
	 * @return Entity
	 */
	public function findById($id)
	{
		return $this->query()->where('id', $id)->firstOrFail();
	}

    /**
     * Handler paginator
     *
     * @param Builder $query
	 * @param string  $search
     * @return void
     */
	public function pagination($query, $search = null)
	{
		// recupera os dados paginados
		$this->data = $query->paginate(config('constants.TOTAL_PAGE'));
        // constroi o paginate para a view
		$this->paginate = $this->data->links();
        // verifica se foi feito uma busca
        if (!empty($search)) {
            // adiciona parametro do filtro no paginate
            $this->paginate = $this->data->appends(['search' => $search])->links();
		}
    }

	/**
	 * Percorre a Collection e customiza dados para imprimir na view
	 *
	 * @return Collection
	 */
	public function format()
	{
		// Percorre toda a Collection
		$this->data->map(function ($collection) {
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
	 * Gerencia os metodos SAVE e UPDATE de um Model
	 *
	 * @param array $data
	 * @param float $backId
	 * @return $this
	 */
    public function store($data = [])
    {
		// inicia o acoplamento de uma transacao
		DB::beginTransaction();

        try {
            // verifica qual acao
            if (!empty($data['id'])) {
                // recupera a entidade
				$entity = $this->query()->where('id', $data['id'])->firstOrFail();
				// realiza o update
				$entity->update($data);

            } else {
                // realiza o save e retorna o objeto
				$entity = $this->make()->create($data);
            }

			// efetiva a transacao
			DB::commit();

			return $entity;

        } catch (Exception $exception) {
            // descarta a transacao
			DB::rollback();

			return $exception->getMessage();
        }
    }

	/**
	 * Altera o status do registro (ativo ou inativo)
	 *
	 * @param int $id
	 * @return array
	 */
	public function changeStatus($id)
	{
		// inicia o acoplamento de uma transacao
		DB::beginTransaction();

		try {
			$entity = $this->query()->where('id', $id)->firstOrFail();

			$entity->update(['status' => !$entity->status]);

			DB::commit();

			return [
				'success' => 'O registro "<strong>' . $entity->name . '</strong>" foi ' . (($entity->status == true) ? 'ativado' : 'desativado!'),
				'id'      => $entity->id,
			];

		} catch (Exception $exception) {

			// descarta a transacao
			DB::rollback();
			// retorna a entidade criada ou atualizada
			return [
				'danger'    => 'Erro ao ativar/desativar o registro de código ' . $id,
				'exception' => $exception,
			];
		}
	}
}
